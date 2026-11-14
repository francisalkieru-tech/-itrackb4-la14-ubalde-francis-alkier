<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Category;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $snacks  = Category::create(['name' => 'Snacks']);
        $canned  = Category::create(['name' => 'Canned Goods']);
        $noodles = Category::create(['name' => 'Instant Noodles']);
        $bev     = Category::create(['name' => 'Beverages']);
        $alcohol = Category::create(['name' => 'Alcoholic Beverages']);

        // ---------- SNACKS ----------
        Product::create([
            'name' => 'Piattos Cheese 85g',
            'price' => 18,
            'stock' => 4,
            'category_id' => $snacks->id,
            'is_available' => true,
            'description' => 'Jack n Jill Piattos Cheese (85g) are thin, light, hexagon-shaped potato crisps.'
        ]);

        Product::create([
            'name' => 'Nova Country Cheddar 78g',
            'price' => 36,
            'stock' => 25,
            'category_id' => $snacks->id,
            'is_available' => true,
            'description' => 'Multigrain snack loaded with rich country cheddar flavor and a satisfying crunch.'
        ]);

        Product::create([
            'name' => 'Chippy Barbecue 110g',
            'price' => 35,
            'stock' => 30,
            'category_id' => $snacks->id,
            'is_available' => false, // UNAVAILABLE
            'description' => 'Classic crispy corn chips coated with smoky and savory barbecue seasoning.'
        ]);

        Product::create([
            'name' => 'SkyFlakes Crackers 10s Pack',
            'price' => 65,
            'stock' => 3,
            'category_id' => $snacks->id,
            'is_available' => true,
            'description' => 'Crispy, oven-baked plain crackers individually wrapped for freshness.'
        ]);

        // ---------- CANNED GOODS ----------
        Product::create([
            'name' => 'Argentina Corned Beef 150g',
            'price' => 36,
            'stock' => 40,
            'category_id' => $canned->id,
            'is_available' => true,
            'description' => 'Argentina Corned Beef is deliciously flavorful, has meaty strands, and is packed with protein.'
        ]);

        Product::create([
            'name' => 'Mega Sardines in Tomato Sauce 155g',
            'price' => 26,
            'stock' => 50,
            'category_id' => $canned->id,
            'is_available' => false, // UNAVAILABLE
            'description' => 'Freshly caught sardines packed in rich, savory tomato sauce.'
        ]);

        Product::create([
            'name' => 'Century Tuna Flakes in Oil 180g',
            'price' => 42,
            'stock' => 5,
            'category_id' => $canned->id,
            'is_available' => true,
            'description' => 'Healthy and delicious tuna flakes soaked in vegetable oil, rich in Omega-3.'
        ]);

        Product::create([
            'name' => '555 Sardines Spanish Style 155g',
            'price' => 30,
            'stock' => 2,
            'category_id' => $canned->id,
            'is_available' => true,
            'description' => 'Sardines infused with oil, spices, and a mild kick of chili.'
        ]);

        // ---------- INSTANT NOODLES ----------
        Product::create([
            'name' => 'Lucky Me! Pancit Canton Original 60g',
            'price' => 18,
            'stock' => 35,
            'category_id' => $noodles->id,
            'is_available' => true,
            'description' => 'Pancit Canton is a popular Filipino stir-fried noodle dish made from wheat-flour and egg flour stick noodles.'
        ]);

        Product::create([
            'name' => 'Lucky Me! Pancit Canton Chilimansi 60g',
            'price' => 18,
            'stock' => 60,
            'category_id' => $noodles->id,
            'is_available' => false, // UNAVAILABLE
            'description' => 'Stir-fried instant noodles blended with zesty calamansi and spicy chili seasoning.'
        ]);

        Product::create([
            'name' => 'Nissin Cup Noodles Seafood 60g',
            'price' => 32,
            'stock' => 4,
            'category_id' => $noodles->id,
            'is_available' => true,
            'description' => 'Ready-to-eat cup noodles with rich seafood broth, crabstick bits, and vegetables.'
        ]);

        Product::create([
            'name' => 'Payless Xtra Big Pancit Canton 130g',
            'price' => 25,
            'stock' => 3,
            'category_id' => $noodles->id,
            'is_available' => true,
            'description' => 'Extra-large serving of savory stir-fried instant noodles for bigger appetites.'
        ]);

        // ---------- BEVERAGES ----------
        Product::create([
            'name' => 'Coca-Cola 1.5L',
            'price' => 75,
            'stock' => 3,
            'category_id' => $bev->id,
            'is_available' => true,
            'description' => 'Classic, refreshing carbonated soft drink in a shareable 1.5-liter bottle.'
        ]);

        Product::create([
            'name' => 'Coca-Cola Mismo 295ml',
            'price' => 20,
            'stock' => 48,
            'category_id' => $bev->id,
            'is_available' => true,
            'description' => 'Single-serve bottle of ice-cold classic Coca-Cola.'
        ]);

        Product::create([
            'name' => 'C2 Green Tea Apple 355ml',
            'price' => 28,
            'stock' => 36,
            'category_id' => $bev->id,
            'is_available' => false, // UNAVAILABLE
            'description' => 'Brewed green tea drink infused with crisp and refreshing apple flavor.'
        ]);

        Product::create([
            'name' => 'Royal Tru-Orange 1.5L',
            'price' => 70,
            'stock' => 2, // LOW STOCK
            'category_id' => $bev->id,
            'is_available' => true,
            'description' => 'Bright and bubbly orange-flavored soda fortified with B-vitamins.'
        ]);

        // ---------- ALCOHOLIC BEVERAGES ----------
        Product::create([
            'name' => 'Red Horse 500ml',
            'price' => 52,
            'stock' => 5,
            'category_id' => $alcohol->id,
            'is_available' => true,
            'description' => 'Extra strong Philippine beer with a robust, high-alcohol kick and a smooth, full-flavored taste.'
        ]);

        Product::create([
            'name' => 'San Miguel Pale Pilsen 320ml',
            'price' => 55,
            'stock' => 24,
            'category_id' => $alcohol->id,
            'is_available' => true,
            'description' => 'Iconic Filipino pale lager beer with a balanced, crisp, and refreshing hoppy flavor.'
        ]);

        Product::create([
            'name' => 'San Mig Light 330ml Can',
            'price' => 62,
            'stock' => 30,
            'category_id' => $alcohol->id,
            'is_available' => false, // UNAVAILABLE
            'description' => 'Low-calorie light beer that delivers full beer flavor without the heavy feel.'
        ]);

        Product::create([
            'name' => 'Emperador Light Brandy 750ml',
            'price' => 165,
            'stock' => 2,
            'category_id' => $alcohol->id,
            'is_available' => true,
            'description' => 'Smooth and light Filipino brandy with subtle notes of oak and caramel.'
        ]);
    }
}