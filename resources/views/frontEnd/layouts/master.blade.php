<!--A Design by W3layouts 
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title')</title>
        <link href="{{asset('public/frontEnd/')}}/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
        <!--theme-style-->
        <link href="{{asset('public/frontEnd/')}}/css/style.css" rel="stylesheet" type="text/css" media="all" />	
        <!--//theme-style-->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <!--fonts-->
        <link rel="stylesheet" href="{{asset('public/frontEnd/')}}/css/etalage.css" type="text/css" media="all" />
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
        <!--//fonts-->
        
        <script src="{{asset('public/frontEnd/')}}/js/jquery.min.js"></script>
        <!--script-->
        <script src="{{asset('public/frontEnd/')}}/js/jquery.etalage.min.js"></script>
        <script>
jQuery(document).ready(function ($) {

    $('#etalage').etalage({
        thumb_image_width: 300,
        thumb_image_height: 400,
        source_image_width: 900,
        source_image_height: 1200,
        show_hint: true,
        click_callback: function (image_anchor, instance_id) {
            alert('Callback example:\nYou clicked on an image with the anchor: "' + image_anchor + '"\n(in Etalage instance: "' + instance_id + '")');
        }
    });

});
        </script>
    </head>
    <body> 
        <!--header-->
        <div class="header">
            @include('frontEnd.layouts.header')
        </div>
        <!---->
        <div class="container">
            @yield('content')  
            <div class="sub-cate">
                @include('frontEnd.layouts.categoriesMenu')	
            </div>
            <div class="clearfix"> </div>        	         
        </div>

        <!---->
        <div class="footer">
            @include('frontEnd.layouts.footer')
        </div>
    </body>
</html>