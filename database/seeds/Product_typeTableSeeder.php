<?php

use Illuminate\Database\Seeder;

class Product_typeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_types')->insert([
       		[
       			'name' => 'Sản phẩm bán chạy',
       			'slug' => 'san-pham-ban-chay',
       			'status'=>1
       		],
       		[
       			'name' => 'Sản phẩm khuyến mại',
       			'slug' => 'san-pham-khuyen-mai',
       			'status'=>1
       		],
       		[
       			'name' => 'Sản phẩm mới',
       			'slug' => 'san-pham-moi',
       			'status'=>1
       		],
        ]);
    }
}
