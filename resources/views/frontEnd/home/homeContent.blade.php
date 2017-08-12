@extends('frontEnd.layouts.master')
@section('title')
E-Bazar Home
@endsection

@section('content')


<div class="shoes-grid">
    <a href="single.html">
        <div class="wrap-in">
            <div class="wmuSlider example1 slide-grid">		 
                <div class="wmuSliderWrapper">		  
                    <article style="position: absolute; width: 100%; opacity: 0;">					
                        <div class="banner-matter">
                            <div class="col-md-5 banner-bag">
                                <img class="img-responsive " src="{{asset('public/frontEnd/')}}/images/bag.jpg" alt=" " />
                            </div>
                            <div class="col-md-7 banner-off">							
                                <h2>FLAT 50% 0FF</h2>
                                <label>FOR ALL PURCHASE <b>VALUE</b></label>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et </p>					
                                <span class="on-get">GET NOW</span>
                            </div>

                            <div class="clearfix"> </div>
                        </div>

                    </article>
                    <article style="position: absolute; width: 100%; opacity: 0;">					
                        <div class="banner-matter">
                            <div class="col-md-5 banner-bag">
                                <img class="img-responsive " src="{{asset('public/frontEnd/')}}/images/bag1.jpg" alt=" " />
                            </div>
                            <div class="col-md-7 banner-off">							
                                <h2>FLAT 50% 0FF</h2>
                                <label>FOR ALL PURCHASE <b>VALUE</b></label>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et </p>					
                                <span class="on-get">GET NOW</span>
                            </div>

                            <div class="clearfix"> </div>
                        </div>

                    </article>
                    <article style="position: absolute; width: 100%; opacity: 0;">					
                        <div class="banner-matter">
                            <div class="col-md-5 banner-bag">
                                <img class="img-responsive " src="{{asset('public/frontEnd/')}}/images/bag.jpg" alt=" " />
                            </div>
                            <div class="col-md-7 banner-off">							
                                <h2>FLAT 50% 0FF</h2>
                                <label>FOR ALL PURCHASE <b>VALUE</b></label>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et </p>					
                                <span class="on-get">GET NOW</span>
                            </div>

                            <div class="clearfix"> </div>
                        </div>

                    </article>

                </div>
                </a>
                <ul class="wmuSliderPagination">
                    <li><a href="#" class="">0</a></li>
                    <li><a href="#" class="">1</a></li>
                    <li><a href="#" class="">2</a></li>
                </ul>
                <script src="{{asset('public/frontEnd/')}}/js/jquery.wmuSlider.js"></script> 
                <script>
$('.example1').wmuSlider();
                </script> 
            </div>
        </div>
    </a>
    <!---->
    
    <div class="product-left">
      @foreach($products as $product)
        <div class="col-md-4 chain-grid grid-top-chain">
            <a href="{{url('product-details/'.$product->id.'/'.$product->product_name)}}"><img class="img-responsive chain" src="{{asset($product->product_main_image)}}" alt=" " /></a>
            <span class="star"> </span>
            <div class="grid-chain-bottom">
                <h6><a>{{$product->product_name}}</a></h6>
                <div class="star-price">
                    <div class="dolor-grid"> 
                        <span class="actual">BDT.{{$product->product_price}}</span>
                        <span class="rating">
                            <input type="radio" class="rating-input" id="rating-input-1-5" name="rating-input-1">
                            <label for="rating-input-1-5" class="rating-star1"> </label>
                            <input type="radio" class="rating-input" id="rating-input-1-4" name="rating-input-1">
                            <label for="rating-input-1-4" class="rating-star1"> </label>
                            <input type="radio" class="rating-input" id="rating-input-1-3" name="rating-input-1">
                            <label for="rating-input-1-3" class="rating-star"> </label>
                            <input type="radio" class="rating-input" id="rating-input-1-2" name="rating-input-1">
                            <label for="rating-input-1-2" class="rating-star"> </label>
                            <input type="radio" class="rating-input" id="rating-input-1-1" name="rating-input-1">
                            <label for="rating-input-1-1" class="rating-star"> </label>
                        </span>
                    </div>
                    <a class="now-get get-cart" href="#">ADD TO CART</a> 
                    <div class="clearfix"> </div>
                </div>
            </div>
        </div>
      @endforeach
        <div class="clearfix"> </div>
    </div>
    <div class="product-left">
    </div>
    <div class="clearfix"> </div>
</div> 

@endsection