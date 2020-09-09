@extends('fontend.master.master')
@section('title')
Giỏ hàng
@endsection
@section('main-content')
<style>
    .price-cart {
        font-size: 12px;
        text-decoration: line-through;
    }

    .note-cart {
        width: 100%;
        height: 100px;
    }

    .cart_img {
        width: 160px;
        height: 120px;
    }

</style>
<div class="cart">

    <div class="wrap">
        <!-- cart empty -->
        @if(!isset($carts) && !isset($carts_user))
            <h4 class="title">Giỏ hàng chưa có sản phẩm</h4>
        @endif
        @if(isset($carts_user))
            @if(count($carts_user)==0)
                <h4 class="title">Giỏ hàng chưa có sản phẩm</h4>
            @endif
        @endif
        <a href="{{ route('index') }}">Tiếp tục mua sắm</a>
        <!-- cart not empty -->
        @if(isset($carts)||(isset($carts_user)&&count($carts_user)!=0))
            <div id="cart-infor">
                <div class="cart-table">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th></th>
                                <th class="name">Sản phẩm</th>
                                <th class="price">Đơn giá</th>
                                <th class="numb">Số lượng</th>
                                <th class="numb"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(Auth::check())
                                {{-- sign in user --}}
                                @foreach($carts_user as $cart)
                                    <tr>
                                        <td><img src="{{ asset($cart->products->avatar->image) }}" alt=""
                                                class="cart_img"></td>
                                        <td>{{ $cart->products->name }}</td>
                                        <td class="price">
                                            {{ number_format($cart->products->sellprice) }}
                                            <br>
                                            <span
                                                class="price-cart">{{ number_format($cart->products->price) }}</span>

                                        </td>
                                        <td>
                                            <form action="" method="get">
                                                <div class="form-group" id="table-cart"
                                                    id="">
                                                    <input type="hidden" name="products_id"
                                                        value="{{$cart->products->id}}">
                                                    <input type="number" class="form-control quantily" min=1
                                                        value="{{$cart['quantily']}}"
                                                        name="quantily"
                                                        id="num{{$cart->products->id}}">
                                                    <button type="submit" class="btn btn-primary update"  value="{{$cart->products->id}}"
                                                        style="z-index: 1">Cập
                                                        nhật</button>
                                                </div>
                                            </form>
                                        </td>
                                        <td>
                                            <a href="{{ route('deleteCart',$cart->id) }}"><button
                                                    type="button" class="btn btn-danger delete-cart" id=""
                                                    style="z-index: 1">Xóa</button></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                {{-- not sign in user --}}
                                @foreach($carts as $key => $cart)
                                    <tr>
                                        <td><img src="" alt="" class="cart_img"></td>
                                        <td>{{$cart['name']}}</td>
                                        <td>
                                            
                                            <br>
                                            <span
                                                class="price">{{number_format($cart['price'])}} đ</span>

                                        </td>
                                        <td>
                                            <form action="" method="get">
                                                <div class="form-group" id="table-cart"
                                                    id="">
                                                    <input type="hidden" name="products_id"
                                                        value="{{$key}}">
                                                    <input type="number" class="form-control quantily" min=1
                                                        value="{{$cart['quantily']}}"
                                                        name="quantily"
                                                        id="num{{$key}}">
                                                    <button type="submit" class="btn btn-primary update"  value="{{$key}}"
                                                        style="z-index: 1">Cập
                                                        nhật</button>
                                                </div>
                                            </form>
                                        </td>
                                        <td>
                                            <a
                                                href=""><button
                                                    type="button"  class="btn btn-danger delete-cart" 
                                                    style="z-index: 1">Xóa</button></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>

                <div class="cart-total">
                    <form action="{{ route('createBill') }}" method="post">
                        @csrf
                        <div class="address">
                            <h4>Thông tin giao hàng</h4>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input id="msg" type="text" class="form-control" name="name" placeholder="Họ và Tên" value="<?php if(Auth::check()) echo Auth::user()->name?>"
                                    required>
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                                <input id="msg" type="text" class="form-control" name="address" placeholder="Địa chỉ" value="<?php if(Auth::check()) echo Auth::user()->address?>"
                                    required>
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                <input id="msg" type="text" class="form-control" name="phone_number"
                                    placeholder="Số điện thoại" value="<?php if(Auth::check()) echo Auth::user()->phone_number?>" required>
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-file-text"></i></span>
                                <textarea name="note" class="note-cart" placeholder="Ghi chú" required="required"></textarea>
                            </div>
                            <input type="hidden" name="users_id"
                                value="<?php if(Auth::check()) echo Auth::user()->id?>">
                        </div>
                        <div class="bils">
                            <h4>Thông tin đơn hàng</h4>
                            <table class="table">
                                <tr>
                                    <td>Tạm tính</td>
                                    <td>
                                        {{ number_format($total) }} <span> đ</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Phí giao hàng</td>
                                    <td>0 <span> đ</span></td>
                                </tr>
                                <tr class="text-total">
                                    <td>Tổng cộng</td>
                                    <td>
                                        <span id="total">{{ number_format($total + $ship) }}</span> <span> đ</span>
                                        <input type="hidden" name="total" value="{{ $total + $ship }}">
                                    </td>
                                </tr>
                            </table>
                            <input type="submit" value="Xác nhận giỏ hàng">
                        </div>
                    </form>
                </div>
                <div class="clear"></div>
            </div>
        @endif
    </div>
</div>
<script type="text/javascript">
    $(function(){
        $('.update').on('click',function(event){

            event.preventDefault();

            var products_id = $(this).attr('value');
            var link = 'http://localhost:8080/shopwatch/ajax/update-cart/'+products_id;

            var id_number = '#num'+products_id;
            var quantily = $(id_number).attr('value');
            $.get(
                 link,
                 { number:quantily}   
                , 
                function(data){
                    //alert('Cập nhật giỏ hàng thành công');
                    $('.bils').html(data);
                }

                );
            
        })
    })
</script>
@include('notify.note')
@endsection
