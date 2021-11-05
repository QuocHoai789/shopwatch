@extends('backend.master.admin_master')
@section('title')
Thêm hướng dẫn mới
@endsection
@section('main-content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm hướng dẫn mới
            </header>
            <div class="panel-body">
                <div class="position-center">
                    <form role="form" action="{{ route('add-huong-dan') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @if(count($errors->all())>0)
                            @include('error.Note')
                        @endif()
                        <div class="form-group">
                            <label for="product">Tiêu đề hướng dẫn</label>
                            <input type="text" name="title" class="form-control" id=""
                                placeholder="Nhập tiêu đề hướng dẫn ">
                        </div>
                        <div class="form-group">
                            <label for="product">Nội dung</label>
                            <textarea class="ckeditor" id="content" name="content"></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label for="mota">Trạng thái</label>
                            <select name="status" class="form-control input-sm m-bot15">
                                <option value="0">Ẩn</option>
                                <option value="1">Hiện</option>
                            </select>
                        </div>
                        <button type="submit" name="add_hd" class="btn btn-info">Thêm Hướng Dẫn</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
