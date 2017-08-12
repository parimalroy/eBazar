<div class="header">
    <div class="top-header">
        <div class="container">
            <div class="top-header-left">
                <ul class="support">
                    <li><a href="#"><label> </label></a></li>
                    <li><a href="#">24x7 live<span class="live"> support</span></a></li>
                </ul>
                <ul class="support">
                    <li class="van"><a href="#"><label> </label></a></li>
                    <li><a href="#">Free shipping <span class="live">on order over 500</span></a></li>
                </ul>
                <div class="clearfix"> </div>
            </div>
            <div class="top-header-right">
                <p style="color: white">E-Bazar</p>
            </div>
            <div class="clearfix"> </div>		
        </div>
    </div>
    <div class="bottom-header">
        <div class="container">
            <div class="header-bottom-left">
                <div class="logo">
                    <a href="{{url('/')}}"><img src="{{asset('public/frontEnd/')}}/images/log.png" alt=" " /></a>
                </div>
                <div class="search">
                    <input type="text" value="" onfocus="this.value = '';" onblur="if (this.value == '') {
                                this.value = '';
                            }" >
                    <input type="submit"  value="SEARCH">

                </div>
                <div class="clearfix"> </div>
            </div>
            <div class="header-bottom-right">					
                <div class="account"><a href=""><span> </span>{{Session::get('customer_name')}}</a></div>
                <ul class="login">
                    <?php if (Session::get('customer_id') == null) { ?>
                        <li><a href="{{url('checkout')}}"><span> </span>LOGIN</a></li> |
                    <?php } else { ?>
                        <li><a href="{{url('customer-logout')}}"><span> </span>Log Out</a></li> |
                    <?php } ?>
                    <li ><a href="{{url('customer-signup')}}">SIGNUP</a></li>
                </ul>
                <div class="cart"><a href="{{url('/show-cart')}}"><span> </span>CART</a></div>
                <div class="clearfix"> </div>
            </div>
            <div class="clearfix"> </div>	
        </div>
    </div>
</div>