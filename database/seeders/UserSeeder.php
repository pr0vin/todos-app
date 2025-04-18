<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        User::create([
            'name' => "Pravin",
            'email' => "prvn@gmail.com",
            'password' => Hash::make('password')
        ]);


        $data = ['cat-1', 'cat-2', 'cat-3', 'cat-4', 'cat-5'];
        foreach ($data as $item) {
            Category::create([
                'name' => $item
            ]);
        }


        DB::table('products')->insert([
            [
                'name' => 'Wireless Mouse',
                'description' => 'Ergonomic wireless mouse with USB receiver.',
                'price' => 25.99,
                'stock' => 50,
                'category' => 'Electronics',
                'category_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Yoga Mat',
                'description' => 'Non-slip yoga mat for all types of workouts.',
                'price' => 19.99,
                'stock' => 30,
                'category' => 'Fitness',
                'category_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Water Bottle',
                'description' => 'Stainless steel insulated water bottle.',
                'price' => 15.00,
                'stock' => 100,
                'category' => 'Accessories',
                'category_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bluetooth Speaker',
                'description' => 'Portable Bluetooth speaker with deep bass.',
                'price' => 49.99,
                'stock' => 20,
                'category' => 'Electronics',
                'category_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Notebook',
                'description' => 'Hardcover ruled notebook with 200 pages.',
                'price' => 8.99,
                'stock' => 75,
                'category' => 'Stationery',
                'category_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
