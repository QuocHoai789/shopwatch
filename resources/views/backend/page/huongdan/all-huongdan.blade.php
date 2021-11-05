@extends('backend.master.admin_master')
@section('title')
    Danh sách hướng dẫn
@endsection
@section('main-content')
<div class="table-agile-info">
    <div class="panel panel-default">
  <div class="panel-heading">
       Danh mục hướng dẫn
      </div>
      <div style="margin-top: 10px;">
          <a style="    background: #00a1ff;padding: 5px 10px;color: #ffff;font-size: 15px;font-weight: 600;" href="{{route('add-huong-dan')}}">Thêm mới</a>
      </div>
  <table class="table table-striped b-t b-light">
      
      <tr>
          <th style="text-align: center;">STT</th>
          <th style="text-align: center;">Tiêu đề</th>
      </tr>
      
      @foreach($huongdan as $hd)
      <tr>
      <td>{{$hd->id}}</td>
      <td>{{$hd->title}}</td>
      
      <td>
          <a href="{{route('edit-huongdan',['id'=>$hd->id])}}">Chỉnh sửa</a>
          <a href="{{route('delete-huongdan',['id'=>$hd->id])}}" onclick="return confirm('Bạn có chắc chắn muốn xóa ?');"><i class="fa fa-trash-o" style="font-size:24px"></i></a>
      </td>
      </tr>
      @endforeach
      
  </table>
  {{$huongdan->links()}}
  </div>
  </div>
@endsection