<!DOCTYPE html>
<html>
<head>
<title>QR Code for Bundle</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<style>
           .logo_gov img
            {
            width:50px;
            height:auto;
            }
            footer {
                position: fixed;
                height: 50px;
                width: 100%;
                background-color: #333333;
                bottom:0;
            
            }

            p.copyright {
                position: absolute;
                width: 100%;
                color: #fff;
                line-height: 40px;
                font-size: 0.7em;
                text-align: center;
                bottom:0;
            }
       </style>
</head>
<body>
<div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/admin_dashbord') }}">
                    Department of Examination
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                          <!--  @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif-->
                        @else
                            <li class="nav-item dropdown">
                               
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                    <a href="/genarate_qr_code"><button type="button" class="btn btn-light">Back</button></a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                   <a href="/admin_genarate_qr_code"><button type="button" class="btn btn-light">Back</button></a> 
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>





<div class="container">

<!--<h2 class="text-center">QR Code for Bundle No {{$qr_data->bundle_number}}({{$qr_data->exam_type}})</h2>-->
<br>
<br>
    <div class="row">
		
			<div class="col-md-12" id="printDiv">
				    <h5  class="text-center">QR Code For Place to Marking</h5>
					<div class="text-center justify-content-center" >
					@php
				
    				$var=QrCode::size(200)->generate("Distric = {$qr_data->distric},place = {$qr_data->place},Subject = {$qr_data->subject} ");
					echo $var;
					@endphp
					</div>
					<br>
					<br>
					
			</div>
			<div class="col-md-12  text-center">
			<button type="button" class="btn btn-primary" id="doPrint">Print QR</button>
           
			</div>
		

			<!--<div class="col-md-4">
				<h5>Qr Code With Color</h5>
     {!! QrCode::size(200)->backgroundColor(255,55,0)->generate('W3Adda Laravel Tutorial'); !!}
				
			</div>-->
		
			<!--<div class="col-md-4">
				<h5>Qr cCode For Bundle</h5>
				
				<img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->merge('https://www.w3adda.com/wp-content/uploads/2019/07/laravel.png', 0.3, true)
                        ->size(200)->errorCorrection('H')
                        ->generate('Bisak Sampath')) !!} ">
             </div>-->
			
	</div>

</div>
<footer>
    
    <p class="copyright">© Department of Examination 2020</p>
</footer>

</body>

</html>
<script>
document.getElementById("doPrint").addEventListener("click", function() {
     var printContents = document.getElementById('printDiv').innerHTML;
     var originalContents = document.body.innerHTML;
     document.body.innerHTML = printContents;
     window.print();
     document.body.innerHTML = originalContents;
});
</script>