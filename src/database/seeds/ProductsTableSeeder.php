<?php

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\User;


class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
         if (Product::count() == 0) {
            
            $user = User::where('username', 'admin')->firstOrFail();

            //10
            $product10 = Product::create([
                'sku'  => 'SKU10',
                'name' => 'Cà phê Socola',
                'slug' => 'product-10',
                'price'          => 1000,
                'category_id' => 4,
                'author_id' => $user->id
            ]);
                        
         }
    }
}
