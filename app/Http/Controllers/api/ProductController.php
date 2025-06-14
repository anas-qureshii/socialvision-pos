<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
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
        $limit = $request->query('limit', 20);
        $offset = $request->query('offset', 0); // Fixed typo

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
}
