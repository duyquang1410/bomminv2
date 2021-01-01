<?php

use Illuminate\Database\Seeder;

class UnitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('units')->insert([
            [
                'user_id' => 1,
                'name' => "Bộ",
                'slug' => 'bo',
                'status'=>1,
                'deleted_at'=>0
            ],
            [
                'user_id' => 1,
                'name' => "Chiếc",
                'slug' => 'chiec',
                'status'=>1,
                'deleted_at'=>0
            ],
            [
                'user_id' => 1,
                'name' => "Cái",
                'slug' => 'cai',
                'status'=>1,
                'deleted_at'=>0
            ],
            [
                'user_id' => 1,
                'name' => "Hộp",
                'slug' => 'hop',
                'status'=>1,
                'deleted_at'=>0
            ],
            [
                'user_id' => 1,
                'name' => "Lọ",
                'slug' => 'lọ',
                'status'=>1,
                'deleted_at'=>0
            ]
        ]);
    }
}
