<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Department of Examination</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
    .container_btn_img {
    position: relative;
     width: 100%;
     max-width: 300px;
     margin:5px;
       
        
    }

    .container_btn_img img {
    width: 100%;
    height: auto;
    opacity: 0.5;
    border-radius: 20%;
    }

     .container_btn_img .btn {
     position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    background-color: #555;
    color: black;
    font-size: 16px;
    padding: 12px 24px;
    border:solid 2px black;
    cursor: pointer;
    border-radius: 5px;
    text-align: center;
    background:  transparent;
    font-weight:bold;
        
    }

    .container_btn_img .btn:hover {
    background-color: #0d669e;
        
    }
    .imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
       
    }
    img.avatar {
    width: 40%;
    border-radius: 50%;
    }    

    
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

    .admin_login
    {
    float:right;
    }
    .space
    {
        padding-bottom: 50px;
    }

    
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
            <div class="logo_gov">
            <img src="img/gov_logo.png">
            </div>
                <a class="navbar-brand" href="{{ url('/home') }}">
                    Department of Examination
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>
                   <div>{{$user_name->name}}|</div>
                    <a href="/admin_logout">Logout </a>
                

            
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    </div>
    <footer>
    
    <p class="copyright">© Department of Examination 2020</p>
    </footer>
  
</body>
</html>
