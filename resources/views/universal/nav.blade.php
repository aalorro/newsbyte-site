<style type="text/css">
	@media only screen and (max-width: 767px){
		.ads{
			height: 80px !important;
		}
		.malawi{
			    background-position: inherit !important;
		}
	}
	@media only screen and (min-width: 768px) and (max-width: 1200px){
		.malawi{
			    background-position: inherit !important;
		}
	}
</style>

<div class="container">
	@if(Request::segment(3) == 'Philippines')
	    <a target="_blank" href="https://http-pilipinas-babycenter-io.0.freebasics.com/?iorg_service_id_internal=351397735068577%3BAfqKOtXK9qXUIdec">
	        <div class="ads malawi" style="background: url('{{url('images/banner3.jpg')}}');background-size:cover;background-position: center; background-repeat: no-repeat; height: 150px;"> </div>
	    </a>
    @elseif(isset($country) && $country == 'Philippines')
	    <a target="_blank" href="https://http-pilipinas-babycenter-io.0.freebasics.com/?iorg_service_id_internal=351397735068577%3BAfqKOtXK9qXUIdec">
	        <div class="ads malawi" style="background: url('{{url('images/banner3.jpg')}}');background-size:cover;background-position: center; background-repeat: no-repeat; height: 150px;"> </div>
	    </a>
	@endif
	@if(Request::segment(3) == 'Malawi')
	    <a href="http://0.freebasics.com/wfp?ref=newsbyte" target="_blank">
	        <div class="ads malawi" style="background: url('{{url('images/prices.jpg')}}');background-size:cover;background-position: center; background-repeat: no-repeat; height: 150px;"> </div>
	    </a>
    @elseif(isset($country) && $country == 'Malawi')
	    <a href="http://0.freebasics.com/wfp?ref=newsbyte" target="_blank">
	        <div class="ads malawi" style="background: url('{{url('images/prices.jpg')}}');background-size:cover;background-position: center; background-repeat: no-repeat; height: 150px;"> </div>
	    </a>
	@endif
    <div class="nav_header">
        <center>
            <a href="{{url('/')}}"><img src="http://dev.newsbyte.org/images/w_newsbyte.png" /></a>
        </center>
    </div>
</div>
