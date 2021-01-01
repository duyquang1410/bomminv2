<?php

use Illuminate\Database\Seeder;

class PositionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('position')->insert([
       		[
       			'name' => 'Quản lý cấp cao',
       		],
       		[
       			'name' => 'Nhân viên Kế toán',
       		],
       		[
       			'name' => 'Trưởng phòng',
       		],
       		[
       			'name' => 'NV Bán hàng',
       		],
       		[
       			'name' => 'Nhân viên viết bài',
       		],
       		[
       			'name' => 'CTV',
       		]
        ]);
    }
}
