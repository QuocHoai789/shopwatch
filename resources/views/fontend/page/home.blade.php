@extends('fontend.master.master')
@section('title')
    Trang chủ
@endsection
@section('content')
<script type="text/javascript" src="js/background.js"></script>
<!-- start slider -->
<div id="fwslider">
    <div class="slider_container">
        @isset($banner)
        @foreach($banner as $ban)
            <div class="slide">
                <!-- Slide image -->
                <a target="_blank" href="{{ $ban->link }}" title="{{ $ban->name }}">
                    <img src="../upload/images/{{ $ban->image }}" alt="" />
                </a>
            </div>
        @endforeach
        @endisset
        <!-- /Duplicate to create more slides -->

        <!--/slide -->
    </div>
    <div class="timers"></div>
    <div class="slidePrev"><span></span></div>
    <div class="slideNext"><span></span></div>
</div>
<!-- end slider -->
<!-- main-content -->
<div class="main1">
    
    @isset($highlight_product)
    @if(count($highlight_product)!=0)
        <div class="main2">
            <div class="main21">
                <h2>Sản phẩm nổi bật</h2>
            </div>
            <div class="main22">
                @foreach($highlight_product as $highlight)
                    <div class="main221">
                        <div class="img1" style="position: relative;">
                            
                            <img width="260" height="280" src="../../{{$highlight->avatar()->image}}">
                            <div class="mua nav-link"><a
                                    class="btn btn-primary" href="{{ route('getProductSingle',['id'=>$highlight->id]) }}">Xem
                                    chi tiết</a></div>
                        </div>
                        <div class="namesp">
                            <p>{{ $highlight->name }}</p>
                        </div>
                        <div class="pri">
                            <div class=" boc-pri">
                                <div class="sell">
                                    <span>{{ number_format($highlight->price,0,',',',')."đ" }}</span>
                                </div>
                                <div class="normalp"><span
                                        style="color: red">{{ number_format($highlight->sellprice,0,',',',')."đ" }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
    @endisset
    <div class="clear"></div>
    @isset($new_product)
    @if(count($new_product)!=0)
        <div class="main2">
            <div class="main21">
                <h2>Sản phẩm mới</h2>
            </div>
            <div class="main22">
                @foreach($new_product as $new_pro)
                    <div class="main221">
                        <div class="img1" style="position: relative;">
                           
                            <img width="260" height="280" src="../../{{ $new_pro->avatar()->image }}">
                            <div class="mua"><a
                                class="btn btn-primary"
                                    href="{{ route('getProductSingle',['id'=>$new_pro->id]) }}">Xem
                                    chi tiết</a></div>
                        </div>
                        <div class="namesp">
                            <p>{{ $new_pro->name }}</p>
                        </div>
                        <div class="pri">
                            <div class=" boc-pri">
                                <div class="sell">
                                    <span>{{ number_format($new_pro->price,0,',',',')."đ" }}</span>
                                </div>
                                <div class="normalp"><span
                                        style="color: red">{{ number_format($new_pro->sellprice,0,',',',')."đ" }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
    @endisset
    <div class="clear"></div>
    <div class="main3">
        <div class="main31">
            <div class="main311"><span>Tin Tức</span></div>
            <div class="main312">
                @isset($new)
                @foreach($new as $n)
                    <div class="main3121">
                        <div class="main3121img"><img width="137" height="137" src="../upload/images/{{ $n->image }}">
                        </div>
                        <div class="main3121nd"><a
                                href="{{ route('detail-new',['id'=>$n->id]) }}">{{ $n->title }}</a>
                        </div>
                    </div>
                @endforeach
                @endisset
            </div>
        </div>
        <div class="main32">
            <div class="main311"><span>Bản đồ</span>
                <div class="BD">
                    <iframe width="400" height="400"
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15676.345735751129!2d106.7169677!3d10.8046919!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x7a7006b269783a40!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBHaWFvIHRow7RuZyBW4bqtbiB04bqjaSBUUC5IQ00!5e0!3m2!1svi!2s!4v1589095980557!5m2!1svi!2s"
                        width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""
                        aria-hidden="false" tabindex="0">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
