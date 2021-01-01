@extends('layout.master')
@section('content')
<div class="menu-user">
    <div class="container">
        <div class="list-action">
            <div class="item-menu-box">
                <a href="{!! route('users.listSalary') !!}">
                      <div class="icon"><i class="fa fa-credit-card-alt" aria-hidden="true"></i></div>
                      <div class="box-title">Tiền lương</div>
                </a>
            </div>

             <div class="item-menu-box">
                <a href="{!! route('users.listSuggestMoney') !!}">
                     <div class="icon"><i class="fa fa-money" aria-hidden="true"></i></div>
                    <div class="box-title">Tạm ứng</div>
                </a>
            </div>

            <div class="item-menu-box">
                <a href="{!! route('users.infoAccount') !!}">
                     <div class="icon"><i class="fa fa-user-circle-o" aria-hidden="true"></i></div>
                     <div class="box-title">Tài khoản</div>
                </a>
            </div>

             <div class="item-menu-box">
                <a href="{!! route('logout') !!}">
                     <div class="icon"><i class="fa fa-sign-out" aria-hidden="true"></i></div>
                     <div class="box-title">Đăng xuất</div>
                </a>
            </div>

        </div>
    </div>
<style>
   .list-action {
        display: inline-flex;
        width: 100%;
        justify-content: space-between;
   }
   .item-menu-box {
        padding: 5px 8px;
        text-align: center;
        background: rgba(255, 255, 255, 0.68);
        border-radius: 5px;
   }
   .menu-user {
        margin: 20px 0;
   }

</style>
<script>
    
</script>
@endsection