<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    //


    public function show($id)
    {

        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                'status' => false,
                'message' => 'Product not found'
            ], 404);
        }

           return response()->json([
            'status' => true,
            'data' => $product,
            'message' => "successfully find the product",
        ]);

    }

    public function searchProduct($search, Request $request)
    {
        // Validate search term length
        if (strlen($search) < 3) {
            return response()->json([
                'status' => false,
                'message' => 'The search term should be at least 3 characters long'
            ]);
        }

        // Get pagination parameters
        $limit = $request->input('limit', 20);
        $offset = $request->input('offset', 0); // Fixed typo

        // Validate pagination parameters
        $limit = max(1, min($limit, 100)); // Limit between 1-100
        $offset = max(0, $offset); // Ensure offset is not negative

        // Build the query
        $query = Product::where('name', 'LIKE', '%' . $search . '%');

        // Get total count for pagination info
        $totalResults = $query->count();

        // Get paginated results
        $searchProducts = $query->limit($limit)
            ->offset($offset)
            ->orderBy('name')
            ->get();


        $hasMore = ($offset + $limit) < $totalResults;
        // Return structured response
        return response()->json([
            'status' => true,
            'data' => $searchProducts,
            'message' => "Found {$totalResults} products matching '{$search}'",
            'pagination' => [
                'total_results' => $totalResults,
                'limit' => $limit,
                'offset' => $offset,
                'has_more' => $hasMore,
                'returned_count' => $searchProducts->count()
            ]
        ]);
    }

    public function addProduct($id, Request $request)
    {

        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                'status' => false,
                'message' => 'Product not found'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'quantity' => [
                'required',
                'numeric',
                'gt:0',
                'lte:' . $product->stock
            ],
            'customprice' => ['nullable', 'numeric'],
            'itemunit' => ['required', 'in:feet,roll']
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $quantity = $request->quantity;
        $customPrice = $request->customprice;
        $itemunit = $request->itemunit;

        // Handle product variations
        if ($product->product_type != '0' && !$request->options) {
            return response()->json([
                'status' => true,
                'message' => "Dealing with variations/attributes",
                'option' => true,
                'option_type' => $product->product_type,
                'data' => $product,
            ]);
        }

        // Get previous cookie data
        $billItemsData = session('billItems', []);

        // Merge data
        $billItem =  [
            'id' => $id,
            'name' => $product->name,
            'price' => $product->price,
            'rollPrice' => $product->roll_price,
            'wholesaleprice' => $product->wholesale_price,
            'retail_price' => $product->retail_price,
            'select_quantity' => $quantity,
            'customPrice' => $customPrice,
            'itemUnit' => $itemunit,
        ];

        $billItemsData[] = $billItem;

        // Encode and queue cookie
        $json_items_data = json_encode($billItemsData);
        session(['billItems' => $billItemsData]);
        return response()->json([
            'status' => true,
            'message' => 'Successfully added the product: ' . $product->name,
            'data' => $billItem,
            'cookie_data' => $billItemsData
        ]);
    }
}
