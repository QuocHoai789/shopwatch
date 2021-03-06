@extends('backend.master.admin_master')
@section('title')
	Thêm người dùng
@endsection
@section('main-content')
<div class="row">
	<div class="col-lg-12">
		<section class="panel">
			<header class="panel-heading">
				Thêm Người Dùng
			</header>
			<div class="panel-body">
                            <div class="position-center">
                                <form role="form" action="{{route('post-add-user')}}" method="post" >
                                    @csrf
                                    
                        				@include('error.Note')
                        			
                                <div class="form-group">
                                    <label for="mail">Email </label>
                                    <input type="text" name="email" class="form-control" id="" placeholder="Nhập email " >
                                </div>
                                <div class="form-group">
                                    <label for="pass">Mật khẩu </label>
                                    <input type="text" name="pass" class="form-control" id="pas">
                                </div>
                                <div class="form-group">
                                    <label for="name">Tên </label>
                                    <input  type="text" name="name" class="form-control"  >
                                    
                                </div>
                                <div class="form-group">
                                    <label for="day">Ngày sinh</label>
                                    <input  type="date" name="birthday" class="form-control"  >
                                    
                                </div>
                                <div class="form-group">
                                    <label for="phone">Số điện thoại</label>
                                    <input  type="text" name="phonenumber" class="form-control"  >
                                    
                                </div>
                                <div class="form-group">
                                    <label for="address">Địa chỉ</label>
                                    <input  type="text" name="address" class="form-control" >
                                    
                                </div>
                                <div class="form-group">
                                    <label for="level">Chức vụ</label>
                                    <select name="level" class="form-control input-sm m-bot15">
                                        <option value="0">Khách hàng</option>
                                        <option value="1">Quản lý</option>
                                    </select>
                                </div>
                                
                                
                                
                                <button type="submit" name="add-user" class="btn btn-info">Thêm người dùng</button>
                                <a href="{{ route('add-user') }}"><button
                                            class="btn btn-default" type="button"
                                            onclick="loading()">Xóa</button>
                                    </a>
                            </form>
                            </div>

                        </div>
		</section>
		
	</div>
</div>
@endsection