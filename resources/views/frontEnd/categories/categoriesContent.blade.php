@extends('frontEnd.layouts.master')
@section('title')
E-Bazar Categories
@endsection
@section('content')
<div class="women-product">
    <div class=" w_content">
        <div class="women">
            <a href="#"><h4>Enthecwear - <span>4449 itemms</span> </h4></a>
            <ul class="w_nav">
                <li>Sort : </li>
                <li><a class="active" href="#">popular</a></li> |
                <li><a href="#">new </a></li> |
                <li><a href="#">discount</a></li> |
                <li><a href="#">price: Low High </a></li> 
                <div class="clearfix"> </div>	
            </ul>
            <div class="clearfix"> </div>	
        </div>
    </div>
    <!-- grids_of_4 -->
    <div class="grid-product">
        @foreach($productsByCategorieId as $productByCategorieId)
        <div class="  product-grid">
            <div class="content_box"><a href="{{url('/product-details/'.$productByCategorieId->id.'/'.$productByCategorieId->product_name)}}">
                    <div class="left-grid-view grid-view-left">
                        <img src="{{asset($productByCategorieId->product_main_image)}}" class="img-responsive watch-right" alt=""/>
                        <div class="mask">
                            <div class="info"></div>
                        </div>
                </a>
            </div>
            <h4>{{$productByCategorieId->product_name}}</h4>
            <p>It is a long established fact that a reader</p>
            BDT.{{$productByCategorieId->product_price}}
        </div>
    </div>
    @endforeach
</div>
<div class="clearfix"> </div>
</div>
@endsection