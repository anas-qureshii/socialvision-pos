<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $products = [
            // Flourish Mates Products
            [
                'name' => 'Decorative Brass Flourish Mate Corner Bracket',
                'slug' => 'decorative-brass-flourish-mate-corner-bracket',
                'price' => 15.50,
                'retail_price' => 18.00,
                'wholesale_price' => 12.50,
                'roll_price' => 2150,
                'stock' => 250,
                'category_id' => 1, // Adjust based on your categories
                'user_id' => 1, // Adjust based on your users
                'description' => 'Premium quality brass flourish mate corner bracket for decorative furniture and cabinet applications. Features intricate detailing and corrosion-resistant finish.',
                'product_type' => '2',
                'attributes' => json_encode([
                    ["finish" => ["Brass", "Antique Brass", "Polished Brass"]],
                    ["size" => ["Small", "Medium", "Large"]]
                ]),
                'variations' => json_encode([
                    ["Small" => [
                        "variation_per_feet" => "2",
                        "variation_per_roll" => "0",
                        "variation_per_retail" => "15",
                        "variation_per_wholesale" => "12",
                        "var_per_stock" => "100"
                    ]],
                    ["Medium" => [
                        "variation_per_feet" => "3",
                        "variation_per_roll" => "0",
                        "variation_per_retail" => "18",
                        "variation_per_wholesale" => "15",
                        "var_per_stock" => "80"
                    ]],
                    ["Large" => [
                        "variation_per_feet" => "4",
                        "variation_per_roll" => "0",
                        "variation_per_retail" => "22",
                        "variation_per_wholesale" => "18",
                        "var_per_stock" => "70"
                    ]]
                ])
            ],
            [
                'name' => 'Ornate Iron Flourish Mate Decorative Handle',
                'slug' => 'ornate-iron-flourish-mate-decorative-handle',
                'price' => 8.75,
                'retail_price' => 12.00,
                'wholesale_price' => 7.50,
                'roll_price' => 2200,
                'stock' => 180,
                'category_id' => 1,
                'user_id' => 1,
                'description' => 'Elegant wrought iron flourish mate handle with vintage design. Perfect for cabinets, drawers, and decorative furniture pieces.',
                'product_type' => '2',
                'attributes' => json_encode([
                    ["length" => ["4 inch", "6 inch", "8 inch"]],
                    ["color" => ["Black", "Bronze", "Antique Iron"]]
                ]),
                'variations' => json_encode([
                    ["4 inch" => [
                        "variation_per_feet" => "1",
                        "variation_per_roll" => "0",
                        "variation_per_retail" => "8",
                        "variation_per_wholesale" => "6.5",
                        "var_per_stock" => "60"
                    ]],
                    ["6 inch" => [
                        "variation_per_feet" => "1.5",
                        "variation_per_roll" => "0",
                        "variation_per_retail" => "12",
                        "variation_per_wholesale" => "9.5",
                        "var_per_stock" => "70"
                    ]],
                    ["8 inch" => [
                        "variation_per_feet" => "2",
                        "variation_per_roll" => "0",
                        "variation_per_retail" => "16",
                        "variation_per_wholesale" => "12.5",
                        "var_per_stock" => "50"
                    ]]
                ])
            ],

            // Metallic PVC Products
            [
                'name' => 'Metallic PVC Electrical Conduit Pipe',
                'slug' => 'metallic-pvc-electrical-conduit-pipe',
                'price' => 6.25,
                'retail_price' => 8.50,
                'wholesale_price' => 5.75,
                'roll_price' => 2750,
                'stock' => 500,
                'category_id' => 1,
                'user_id' => 1,
                'description' => 'Heavy-duty metallic PVC conduit pipe for electrical installations. Provides excellent protection and durability for wiring systems.',
                'product_type' => '1',
                'attributes' => json_encode([
                    ["diameter" => ["20mm", "25mm", "32mm", "40mm"]]
                ]),
                'variations' => json_encode([])
            ],
            [
                'name' => 'Metallic PVC Pipe Fitting Elbow Connector',
                'slug' => 'metallic-pvc-pipe-fitting-elbow-connector',
                'price' => 3.25,
                'retail_price' => 4.50,
                'wholesale_price' => 2.75,
                'roll_price' => 2400,
                'stock' => 300,
                'category_id' => 1,
                'user_id' => 1,
                'description' => 'Premium metallic PVC elbow connector for pipe fittings. 90-degree angle with secure threading for leak-proof connections.',
                'product_type' => '2',
                'attributes' => json_encode([
                    ["size" => ["1/2 inch", "3/4 inch", "1 inch", "1.5 inch"]],
                    ["angle" => ["90 degree", "45 degree"]]
                ]),
                'variations' => json_encode([
                    ["1/2 inch" => [
                        "variation_per_feet" => "0",
                        "variation_per_roll" => "0",
                        "variation_per_retail" => "3.25",
                        "variation_per_wholesale" => "2.5",
                        "var_per_stock" => "80"
                    ]],
                    ["3/4 inch" => [
                        "variation_per_feet" => "0",
                        "variation_per_roll" => "0",
                        "variation_per_retail" => "4.5",
                        "variation_per_wholesale" => "3.25",
                        "var_per_stock" => "70"
                    ]],
                    ["1 inch" => [
                        "variation_per_feet" => "0",
                        "variation_per_roll" => "0",
                        "variation_per_retail" => "6.75",
                        "variation_per_wholesale" => "5",
                        "var_per_stock" => "60"
                    ]],
                    ["1.5 inch" => [
                        "variation_per_feet" => "0",
                        "variation_per_roll" => "0",
                        "variation_per_retail" => "9.5",
                        "variation_per_wholesale" => "7.25",
                        "var_per_stock" => "50"
                    ]]
                ])
            ],
            [
                'name' => 'Metallic PVC T-Junction Connector',
                'slug' => 'metallic-pvc-t-junction-connector',
                'price' => 4.75,
                'retail_price' => 6.50,
                'wholesale_price' => 4.00,
                'roll_price' => 2200,
                'stock' => 200,
                'category_id' => 1,
                'user_id' => 1,
                'description' => 'Durable metallic PVC T-junction connector for branching pipe systems. Corrosion-resistant with precision threading.',
                'product_type' => '2',
                'attributes' => json_encode([
                    ["size" => ["20mm", "25mm", "32mm"]],
                    ["material_grade" => ["Standard", "Heavy Duty"]]
                ]),
                'variations' => json_encode([
                    ["20mm" => [
                        "variation_per_feet" => "0",
                        "variation_per_roll" => "0",
                        "variation_per_retail" => "4.75",
                        "variation_per_wholesale" => "3.5",
                        "var_per_stock" => "70"
                    ]],
                    ["25mm" => [
                        "variation_per_feet" => "0",
                        "variation_per_roll" => "0",
                        "variation_per_retail" => "6.5",
                        "variation_per_wholesale" => "5",
                        "var_per_stock" => "60"
                    ]],
                    ["32mm" => [
                        "variation_per_feet" => "0",
                        "variation_per_roll" => "0",
                        "variation_per_retail" => "8.75",
                        "variation_per_wholesale" => "6.75",
                        "var_per_stock" => "50"
                    ]]
                ])
            ],

            // Additional Hardware Products
            [
                'name' => 'Chrome Plated Flourish Mate Cabinet Knob',
                'slug' => 'chrome-plated-flourish-mate-cabinet-knob',
                'price' => 5.50,
                'retail_price' => 7.25,
                'wholesale_price' => 4.75,
                'roll_price' => 1890,
                'stock' => 400,
                'category_id' => 1,
                'user_id' => 1,
                'description' => 'Elegant chrome-plated cabinet knob with flourish design pattern. Features smooth operation and long-lasting finish.',
                'product_type' => '2',
                'attributes' => json_encode([
                    ["diameter" => ["25mm", "30mm", "35mm"]],
                    ["finish" => ["Chrome", "Brushed Chrome", "Polished Chrome"]]
                ]),
                'variations' => json_encode([
                    ["25mm" => [
                        "variation_per_feet" => "0",
                        "variation_per_roll" => "0",
                        "variation_per_retail" => "5.5",
                        "variation_per_wholesale" => "4.25",
                        "var_per_stock" => "150"
                    ]],
                    ["30mm" => [
                        "variation_per_feet" => "0",
                        "variation_per_roll" => "0",
                        "variation_per_retail" => "7.25",
                        "variation_per_wholesale" => "5.5",
                        "var_per_stock" => "130"
                    ]],
                    ["35mm" => [
                        "variation_per_feet" => "0",
                        "variation_per_roll" => "0",
                        "variation_per_retail" => "9",
                        "variation_per_wholesale" => "7",
                        "var_per_stock" => "120"
                    ]]
                ])
            ],
            [
                'name' => 'Metallic PVC Flexible Conduit Hose',
                'slug' => 'metallic-pvc-flexible-conduit-hose',
                'price' => 12.50,
                'retail_price' => 16.00,
                'wholesale_price' => 10.75,
                'roll_price' => 250.00,
                'stock' => 150,
                'category_id' => 1,
                'user_id' => 1,
                'description' => 'Flexible metallic PVC conduit hose for complex electrical installations. Bendable design with excellent protection properties.',
                'product_type' => '1',
                'attributes' => json_encode([
                    ["diameter" => ["16mm", "20mm", "25mm", "32mm"]],
                    ["length" => ["10 feet", "25 feet", "50 feet"]]
                ]),
                'variations' => json_encode([])
            ],
            [
                'name' => 'Antique Brass Flourish Mate Hinge Set',
                'slug' => 'antique-brass-flourish-mate-hinge-set',
                'price' => 18.75,
                'retail_price' => 24.00,
                'wholesale_price' => 16.25,
                'roll_price' => 1200,
                'stock' => 120,
                'category_id' => 1,
                'user_id' => 1,
                'description' => 'Premium antique brass hinge set with flourish design elements. Includes mounting screws and detailed installation guide.',
                'product_type' => '2',
                'attributes' => json_encode([
                    ["size" => ["2 inch", "3 inch", "4 inch"]],
                    ["quantity" => ["Set of 2", "Set of 4", "Set of 6"]]
                ]),
                'variations' => json_encode([
                    ["2 inch" => [
                        "variation_per_feet" => "0",
                        "variation_per_roll" => "0",
                        "variation_per_retail" => "18.75",
                        "variation_per_wholesale" => "15",
                        "var_per_stock" => "40"
                    ]],
                    ["3 inch" => [
                        "variation_per_feet" => "0",
                        "variation_per_roll" => "0",
                        "variation_per_retail" => "24",
                        "variation_per_wholesale" => "19.5",
                        "var_per_stock" => "45"
                    ]],
                    ["4 inch" => [
                        "variation_per_feet" => "0",
                        "variation_per_roll" => "0",
                        "variation_per_retail" => "30",
                        "variation_per_wholesale" => "24.5",
                        "var_per_stock" => "35"
                    ]]
                ])
            ],
            [
                'name' => 'Metallic PVC Pipe Cap End Fitting',
                'slug' => 'metallic-pvc-pipe-cap-end-fitting',
                'price' => 2.25,
                'retail_price' => 3.50,
                'wholesale_price' => 1.85,
                'roll_price' => 1000,
                'stock' => 500,
                'category_id' => 1,
                'user_id' => 1,
                'description' => 'Metallic PVC pipe cap for sealing pipe ends. Threaded design ensures secure fit and prevents debris entry.',
                'product_type' => '0',
                'attributes' => json_encode([]),
                'variations' => json_encode([])
            ]
        ];

         foreach ($products as $productData) {
            Product::create([
                'name' => $productData['name'],
                'slug' => $productData['slug'],
                'price' => $productData['price'],
                'retail_price' => $productData['retail_price'],
                'wholesale_price' => $productData['wholesale_price'],
                'roll_price' => $productData['roll_price'],
                'stock' => $productData['stock'],
                'category_id' => $productData['category_id'],
                'user_id' => $productData['user_id'],
                'description' => $productData['description'],
                'product_type' => $productData['product_type'],
                'attributes' => $productData['attributes'],
                'variations' => $productData['variations'],
            ]);
        }
    }
}
