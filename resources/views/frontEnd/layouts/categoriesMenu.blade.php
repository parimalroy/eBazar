<div class=" top-nav rsidebar span_1_of_left">
    <h3 class="cate">CATEGORIES</h3>
    <ul class="menu">
        <ul>
            <li class="item"><a href="{{url('/')}}">Home</a></li>
        </ul>
        @foreach($allPublishCategies as $allPublishCategie)
        <ul>
            <li class="item1">
                <a href="{{url('/categories-new/'.$allPublishCategie->id)}}">{{$allPublishCategie->categorie_name}}</a>
            </li>
        </ul>
        @endforeach
        <ul class="kid-menu ">
            <li class="menu-kid-left"><a href="{{url('/')}}">Contact us</a></li>
        </ul>
    </ul>
</div>
<!--initiate accordion-->
<script type="text/javascript">
    $(function () {
        var menu_ul = $('.menu > li > ul'),
                menu_a = $('.menu > li > a');
        menu_ul.hide();
        menu_a.click(function (e) {
            e.preventDefault();
            if (!$(this).hasClass('active')) {
                menu_a.removeClass('active');
                menu_ul.filter(':visible').slideUp('normal');
                $(this).addClass('active').next().stop(true, true).slideDown('normal');
            } else {
                $(this).removeClass('active');
                $(this).next().stop(true, true).slideUp('normal');
            }
        });

    });
</script>
<div class=" chain-grid menu-chain">
    <a href="{{url('/')}}"><img class="img-responsive chain" src="{{asset('public/frontEnd/')}}/images/wat.jpg" alt=" " /></a>	   		     		
    <div class="grid-chain-bottom chain-watch">
        <span class="actual dolor-left-grid">BDT.300</span>
        <span class="reducedfrom">TK.500</span>  
        <h6><a href="">New Watch</a></h6>  		     			   		     										
    </div>
</div>
<a class="view-all all-product" href="{{url('/')}}">VIEW ALL PRODUCTS<span> </span></a> 