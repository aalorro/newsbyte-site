@if(Request::segment(3) == 'Philippines')
	<a href="http://www.gigsplash.com/">
	<div style="background: url('{{url('images/banner.jpg')}}');background-size:cover;background-position: center; background-repeat: no-repeat; height: 200px;"> 
			
	</div>
	</a>
@elseif(isset($country) && $country == 'Philippines')
	<a href="http://www.gigsplash.com/">
	<div style="background: url('{{url('images/banner.jpg')}}');background-size:cover;background-position: center; background-repeat: no-repeat; height: 200px;"> 
			
	</div>
	</a>
@endif
    <div class="nav_header">
        <center>
            <a href="{{url('/')}}"><img src="http://dev.newsbyte.org/images/w_newsbyte.png"/></a>
        </center>
    </div>