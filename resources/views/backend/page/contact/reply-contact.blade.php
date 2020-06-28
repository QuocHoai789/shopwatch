@extends('backend.master.admin_master')
@section('title')
	Phản hồi liên hệ
@endsection
@section('main-content')
	 <div class="form">
	 					@foreach($contact as $con)
                        <form class="cmxform form-horizontal " id="" method="post"
                            action="{{ route('postReply',['id'=>$con->id]) }}">
                            @csrf
                            @include('error.Note')
                            
                            <div class="form-group ">
                                <label for="name" class="control-label col-lg-3">Tên người gửi</label>
                                <div class="col-lg-6">
                                    <input class=" form-control" id="name" name="name" type="text" value="{{$con->name}}" 
                                        >
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="mail" class="control-label col-lg-3">Email người gửi</label>
                                <div class="col-lg-6">
                                    <input class=" form-control" id="mail" name="mail" type="text" value="{{$con->email}}" 
                                        >
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="password" class="control-label col-lg-3">Nội dung liên hệ</label>
                                <div class="col-lg-6">
                                    <textarea id="content" name="message" >{!!$con->message!!}</textarea>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="password" class="control-label col-lg-3">Nội dung phản hồi</label>
                                <div class="col-lg-6">
                                    <textarea id="content" class="ckeditor" name="reply_message" ></textarea>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="sellprice" class="control-label col-lg-3">Trạng thái</label>
                                
                            </div>
							@endforeach
                            <div class="form-group">
                                <div class="col-lg-offset-3 col-lg-6">
                                    <button class="btn btn-primary" type="submit">Gửi</button>
                                    <a href="{{ route('addBrand') }}" onclick="loading()"><button
                                            class="btn btn-default" type="button">Xóa</button>
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>

@endsection