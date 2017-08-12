<div class="footer-top">
    
</div>
<div class="footer-bottom well">
    <div class="container">
        <div class="footer-bottom-cate">
            <h6>CATEGORIES</h6>
            <ul>
                @foreach($allPublishCategies as $allPublishCategie)
                <li><a href="{{url('/categories-new/'.$allPublishCategie->id)}}">{{$allPublishCategie->categorie_name}}</a></li>
                @endforeach
                
            </ul>
        </div>
        <div class="footer-bottom-cate bottom-grid-cat">
            <h6>FEATURE PROJECTS</h6>
            <ul>
                <li><a href="#">Curabitur sapien</a></li>
                <li><a href="#">Dignissim purus</a></li>
                <li><a href="#">Tempus pretium</a></li>
                <li ><a href="#">Dignissim neque</a></li>
                <li ><a href="#">Ornared id aliquet</a></li>
                <li><a href="#">Ultrices id du</a></li>
                <li><a href="#">Commodo sit</a></li>
            </ul>
        </div>
        <div class="footer-bottom-cate">
            <h6>TOP BRANDS</h6>
            <ul>
                <li><a href="#">Curabitur sapien</a></li>
                <li><a href="#">Dignissim purus</a></li>
                <li><a href="#">Tempus pretium</a></li>
                <li ><a href="#">Dignissim neque</a></li>
                <li ><a href="#">Ornared id aliquet</a></li>
                <li><a href="#">Ultrices id du</a></li>
                <li><a href="#">Commodo sit</a></li>
                <li ><a href="#">Urna ac tortor sc</a></li>
                <li><a href="#">Ornared id aliquet</a></li>
                <li><a href="#">Urna ac tortor sc</a></li>
                <li ><a href="#">Eget nisi laoreet</a></li>
                <li ><a href="#">Faciisis ornare</a></li>
            </ul>
        </div>
        <div class="footer-bottom-cate cate-bottom">
            <h6>OUR ADDERSS</h6>
            <ul>
                <li>House No-48 Road No-2. </li>
                <li>Block A Mirpur-6,Dhaka 1216</li>
                <li class="email"> Email:parimal.reg@gmail.com</li>
                <li class="phone" >Phone:01920268974</li>
                <li class="temp"> <p class="footer-class"></p></li>
            </ul>
        </div>
        <div class="clearfix"> </div>
    </div>
</div>