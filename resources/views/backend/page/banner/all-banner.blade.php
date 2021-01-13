@extends('backend.master.admin_master')
@section('title')
    Danh sách các banner
@endsection
@section('main-content')
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            Danh mục banner
        </div>

        @if(session('status'))
            <div class="alert alert-info">
                <p style="text-align: center;color: red;">{{ session('status') }}</p>
            </div>
        @endif
        <table class="table table-striped b-t b-light">

            <tr>
                <th>STT</th>
                <th>Tên Banner</th>
                <th>Liên kết</th>
                <th>Hình Ảnh</th>
                <th>Trạng thái</th>
                <th>Thứ tự</th>
                <th></th>
            </tr>
                <?php $stt=1 ?>
                @foreach($banners as $ban)
                    <tr>
                        <td>{{ $stt++}}</td>
                        <td>{{ $ban->name }}</td>
                        <td>{{ $ban->link }}</td>
                        <td><img src="../upload/images/{{ $ban->image }}" width="100" height="100"></td>
                        <td>

                            @if($ban->status==0)
                                <a
                                    href="" data-sta ="0"  data-id ="{{$ban->id}}" class ="status">Ẩn</a>
                            @elseif($ban->status==1)
                                <a
                                    href="" data-sta ="1" data-id ="{{$ban->id}}" class ="status">Hiện</a>
                            @endif
                        </td>
                        <td >{{ $ban->ordernum }}</td>
                        <td>
                            <a
                                href="{{ route('edit-banner',['id'=>$ban->id]) }}"><i
                                    style="font-size: 20px" class="fa fa-pencil text-success text-active"></i></a>
                            <a href="{{ route('delete-banner',['id'=>$ban->id]) }}"
                                onclick="return confirm('Bạn có chắc chắn muốn xóa ?');"><i class="fa fa-trash-o"
                                    style="font-size:24px"></i></a>
                        </td>
                    </tr>
                @endforeach
        
        </table>
    </div>
</div>
<script type="text/javascript">
    $(function(){
        $('.status').on('click', function(e){
            e.preventDefault();
            var a = $(this);
            var sta = a.data('sta');
            var id = a.data('id');
            $.get(
                'http://localhost:8080/shopwatch/admin/banner/status/'+id,
                {
                    status : sta
                },
                function(data){
                    a.html(data);
                    alert('Chỉnh sửa trạng thái thành công');
                    
                }

                );

        });
    })
</script>
@if(session()->has('notification'))
@include('notify.note')
@endif
@endsection
