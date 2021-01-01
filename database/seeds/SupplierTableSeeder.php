<?php

use Illuminate\Database\Seeder;

class SupplierTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('suppliers')->insert([
            [
                'user_id' => 1,
                'name' => "Công ty cổ phần Đông Á",
                'slug' => 'cong-ty-co-phan-dong-a',
                'address'=>'Số 24 Hồ Tùng Mậu, Hà Nội',
                'phone'=>'84982039380',
                'gmail'=>'ndquang1410@gmail.com',
                'info'=>'Cung cấp các sản phẩm  hàng điện tử chính hãng',
                'status'=>1,
                'deleted_at'=>0
            ],
            [
                'user_id' => 1,
                'name' => "Công ty cổ phần Điện tử Huy Hà",
                'slug' => 'cong-ty-co-phan-dien-tu-huy-ha',
                'address'=>'Số 154 Đường Láng , Đống đa , TP Hà Nội',
                'phone'=>'84982039380',
                'gmail'=>'ndquang1410@gmail.com',
                'info'=>'Cung cấp các sản phẩm  hàng điện tử chính hãng',
                'status'=>1,
                'deleted_at'=>0
            ],
            [
                'user_id' => 1,
                'name' => "Công ty Công nghệ Hòa An",
                'slug' => 'cong-ty-cong-nghe-hoa-an',
                'address'=>'Số 65B Đường Nguyễn Chí Thanh, Đống đa , TP Hà Nội',
                'phone'=>'84982039380',
                'gmail'=>'ndquang1410@gmail.com',
                'info'=>'Cung cấp các sản phẩm  hàng điện tử chính hãng',
                'status'=>1,
                'deleted_at'=>0
            ],
            [
                'user_id' => 1,
                'name' => "Công ty cổ phần Việt Tiến Nhật",
                'slug' => 'cong-ty-co-phan-viet-tien-nhat',
                'address'=>'Số 24 Lê Đức Thọ, Hà Nội',
                'phone'=>'84982039380',
                'gmail'=>'ndquang1410@gmail.com',
                'info'=>'Cung cấp các sản phẩm  hàng điện tử chính hãng',
                'status'=>1,
                'deleted_at'=>0
            ],
            [
                'user_id' => 1,
                'name' => "Công ty Thế giới máy tính Quang Thái",
                'slug' => 'cong-ty-the-gioi-may-tinh-quang-thai',
                'address'=>'Số 768 Đường Láng Đống đa, TP Hà Nội',
                'phone'=>'84982039380',
                'gmail'=>'ndquang1410@gmail.com',
                'info'=>'Cung cấp các sản phẩm  hàng điện tử chính hãng',
                'status'=>1,
                'deleted_at'=>0
            ],
        ]);
    }
}
