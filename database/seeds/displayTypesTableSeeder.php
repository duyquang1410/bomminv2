<?php

use Illuminate\Database\Seeder;

class displayTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('displaytypes')->insert([
           [
           		'user_id'=>1,
           		'title'=>'Mặc định',
       			'code'=>'Default',
           ],
           [
           		'user_id'=>1,
           		'title'=>'Đường dẫn',
       			'code'=>'Link',
           ],
           [	
           		'user_id'=>1,
           		'title'=>'Kế thừa',
       			'code'=>'Inherit',
           ],
            [	
            	'user_id'=>1,
           		'title'=>'Tùy chỉnh',
       			'code'=>'Custom',
           ]
        ]);
    }
}
