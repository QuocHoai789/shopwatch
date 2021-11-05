@extends('fontend.master.master')
@section('title')
    Sản phẩm
@endsection
@section('content')
<style type="text/css">
    .active{
        color: red;
    }
</style>
<div class="mens">
    <div class="main">
        <div class="wrap">
            <div class="cont span_2_of_3">
                
                <h2 class="head">
                    @if($i==1)
                        Sản phẩm nam
                    @endif
                    @if($i==2)
                        Sản phẩm nữ
                    @endif
                </h2>
                <div class="mens-toolbar">
                    <div class="sort">
                        <div class="sort-by">
                            <form  method="get" action="" >
                            <label>Sắp xếp</label>
                            <select name="sort" onchange="javascript:this.form.submit()" >
                                <option value="id" @if(Request::get('sort')=='id'||Request::get('sort')==''){{'selected'}}  @endif >
                                Mặc định </option>
                                <option value="name" @if(Request::get('sort')=='name'){{'selected'}}  @endif >
                                Tên giảm dần </option>
                                <option value="price_asc" @if(Request::get('sort')=='price_asc'){{'selected'}}  @endif >
                                Giá tăng dần  </option>
                                <option value="price_desc" @if(Request::get('sort')=='price_desc'){{'selected'}}  @endif >
                                Giá giảm dần  </option>
                            </select></form>
                            <!-- <a href=""><img src="images/arrow2.gif" alt="" class="v-middle"></a> -->
                        </div>
                    </div>
                    <div class="pager">
                        <div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="spbrand">
                        @foreach($product as $pro)
                        <div class="spbrand1">
                            <div class="img1" style="position: relative;">
                                <img width="260" height="280" src="../../{{$pro->image}}">
                                <div class="mua"><a class="btn btn-primary" href="{{route('getProductSingle',['id'=>$pro->id])}}">Xem chi tiết</a></div>
                            </div>
                            <div class="namesp"><p >{{$pro->name}}</p></div>
                            <div class="pri">
                                <div class=" boc-pri">
                                    <div class="sell"><span >{{ number_format($pro->price,0,',',',')."đ" }}</span></div>
                                    <div class="normalp"><span style="color: red" >{{ number_format($pro->sellprice,0,',',',')."đ" }}</span></div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        
                        

                    </div>
                <div class="row">
                    {{ $product->links() }}
                </div>
            </div>
            <div class="rsidebar span_1_of_left">
                <section class="sky-form">
                    <h4>Giá tiền</h4>
                    <div class="row row1 scroll-pane">
                        <div class="col col-4">
                           
                            
                            <label class="checkbox"><i></i><a class="{{Request::get('price')==1?'active':''}}" href="{{request()->fullUrlWithQuery(['price'=>1])}}">Dưới 5,000,000</a></label>
                            <label class="checkbox"></i><a class="{{Request::get('price')==2?'active':''}}" href="{{request()->fullUrlWithQuery(['price'=>2])}}">Từ 5,000,000 đến 10,000,000</a></label>
                            <label class="checkbox"><i></i><a class="{{Request::get('price')==3?'active':''}}" href="{{request()->fullUrlWithQuery(['price'=>3])}}">Trên 10,000,000</a></label>
                        
                        </div>
                    </div>
                </section>
                <section class="sky-form">
                    <h4>Thương hiệu</h4>
                    <div class="row row1 scroll-pane">
                        <div class="col col-4">
                           
                            <form id="form_price" name="form-price" action="{{ url()->current()}}" method="get">
                            @foreach($brands as $brand)
                            @php
                            $checked = array();
                            if (isset($_GET['brand'])){
                                
                                        $checked = $_GET['brand'];
                            }
                           
                        @endphp
                        
                        
                                <input type="checkbox" class="locth{{Request::get('brand')==$brand->id?'active':''}}" id="th{{$brand->id}}" name="brand[]" data-th="{{$brand->id}}" value="{{$brand->id}}" @if(in_array($brand->id, $checked)) checked @endif >
                                    <label for="brand">{{$brand->name}}</label><br>
                                
                            {{-- <label class="checkbox"><a class="{{Request::get('brand')==$brand->id?'active':''}}" href="{{request()->fullUrlWithQuery(['brand'=>$brand->id])}}"><i></i>{{$brand->name}}</a></label> --}}
                            @endforeach
                            <input type="submit" name="" id="">
                        </form>
                        </div>
                    </div>
                </section>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>
<script src="js/jquery.easydropdown.js"></script>
@endsection