@extends('frontEnd.layouts.master')
@section('title')
E-Bazar Product
@endsection

@section('content')
<div class=" single_top">
    <div class="single_grid">
        @foreach($products as $product)
        <div class="grid images_3_of_2">
            <ul id="etalage">
                <li>
                    <a href="optionallink.html">
                        <img class="etalage_thumb_image" src="{{asset($product->product_main_image)}}" class="img-responsive" />
                        <img class="etalage_source_image" src="{{asset($product->product_main_image)}}" class="img-responsive" title="" />
                    </a>
                </li>
                <li>
                    <img class="etalage_thumb_image" src="{{asset($product->product_image1)}}" class="img-responsive" />
                    <img class="etalage_source_image" src="{{asset($product->product_image1)}}" class="img-responsive" title="" />
                </li>
                <li>
                    <img class="etalage_thumb_image" src="{{asset($product->product_image2)}}" class="img-responsive"  />
                    <img class="etalage_source_image" src="{{asset($product->product_image2)}}"class="img-responsive"  />
                </li>
            </ul>
            <div class="clearfix"> </div>		
        </div> 

        <div class="desc1 span_3_of_2">


            <h4>{{$product->product_name}}</h4>
            <div class="cart-b">
                <div class="left-n">BDT.{{$product->product_price}}</div>
                <div class="btn_form">
                    <form action="{{url('/add-to-cart')}}" method="POST" class="form-inline" > 
                        {{csrf_field()}}
                        <div class="form-group">
                            <input type="number" value="1" min="1" name="product_quantity" class="form-control">
                            <input type="hidden" value="{{$product->id}}" name="product_id">
                        </div>
                        <div class="form-group">
                            <input type="submit" name="btn" class=" btn btn-success" value="Add To Cart"/>
                        </div>
                    </form>
                </div>
                <div class="clearfix"></div>
            </div>
            <h6>Quantity :{{$product->product_quantity}}</h6>
            <p>{{$product->product_short_description}}</p>
            <div class="share">
                <h5>Share Product :</h5>
                <ul class="share_nav">
                    <li><a href="#"><img src="{{asset('public/frontEnd/')}}/images/facebook.png" title="facebook"></a></li>
                    <li><a href="#"><img src="{{asset('public/frontEnd/')}}/images/twitter.png" title="Twiiter"></a></li>
                    <li><a href="#"><img src="{{asset('public/frontEnd/')}}/images/rss.png" title="Rss"></a></li>
                    <li><a href="#"><img src="{{asset('public/frontEnd/')}}/images/gpluse.png" title="Google+"></a></li>
                </ul>
            </div>

            @endforeach
        </div>
        <div class="clearfix"> </div>
    </div>
    <ul id="flexiselDemo1">
        @foreach($productsByCategorieId as $productByCategorieId)
        <li><a href="{{url('/product-details/'.$productByCategorieId->id.'/'.$productByCategorieId->product_name)}}"><img src="{{asset($productByCategorieId->product_main_image)}}" /><div class="grid-flex"><a href=""></a><p>BDT:{{$productByCategorieId->product_price}}</p></div></a></li>
        @endforeach
    </ul>
    <script type="text/javascript">
        $(window).load(function () {
            $("#flexiselDemo1").flexisel({
                visibleItems: 5,
                animationSpeed: 1000,
                autoPlay: true,
                autoPlaySpeed: 3000,
                pauseOnHover: true,
                enableResponsiveBreakpoints: true,
                responsiveBreakpoints: {
                    portrait: {
                        changePoint: 480,
                        visibleItems: 1
                    },
                    landscape: {
                        changePoint: 640,
                        visibleItems: 2
                    },
                    tablet: {
                        changePoint: 768,
                        visibleItems: 3
                    }
                }
            });

        });
    </script>
    <script type="text/javascript" src="{{asset('public/frontEnd/')}}/js/jquery.flexisel.js"></script>


</div>
@endsection