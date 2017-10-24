<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(LanguagesTableSeeder::class);
        $this->call(PermissionTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(RolePermissionsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);         
        $this->call(ProductsTableSeeder::class);
        $this->call(BookAddressesTableSeeder::class);           
        $this->call(FaqsTableSeeder::class);
        $this->call(FaqTranslationsTableSeeder::class);    
        $this->call(InfoPagesTableSeeder::class);
        $this->call(InfoPageTranslationsTableSeeder::class);
        $this->call(SlidersTableSeeder::class);
        $this->call(SliderTranslationsTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(ProductTranslationsTableSeeder::class); 
        $this->call(PostsTableSeeder::class);
        $this->call(PostTranslationsTableSeeder::class);                                          
    }
}
