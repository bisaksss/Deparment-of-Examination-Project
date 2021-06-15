<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Genarate QR Code</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    

<div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
            <div class="logo_gov">
            <img src="img/gov_logo.png">
            </div>
                <a class="navbar-brand" href="{{ url('/admin') }}">
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
                                    <a href="/home"><button type="button" class="btn btn-light">Back</button></a>

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
                
                    
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
  


            <div class="container space">
                          
                         
                <div class="text-center">
                             <h1>Manage User</h1>

                             <div class="row">
                            

                                <div class="col-md-12">

                                <table class="table table-dark">
                                    <thead>
                                    <tr>
                                    <th>ID</th>
                                    <th>User Name</th>
                                    <th>Email</th>
                                    <th>Verify</th>
                                    <th>Delete</th>
                                 
                                    </tr>
                                    </thead>
                                    @foreach($user_detail as $data)
                                    <tbody>
                                    <tr>
                                    <td>{{$data->id}}</td>
                                    <td>{{$data->name}}</td>
                                    <td>{{$data->email}}</td>
                                    <td>
                                    @if($data->remember_token==null)
                                    <a href="/verify_user/{{$data->id}}"><button type="button" class="btn btn-secondary">Not Verified</button></a>
                                    @else
                                    <a href="/un_verify_user/{{$data->id}}"><button type="button" class="btn btn-success">Verified</button></a>
                                    
                                    @endif
                                    </td>
                                    <td>
                                    
                                   <a href="/delete_user/{{$data->id}}"><button type="button" class="btn btn-danger">Delete</button></a> 
                                    </td>
                                    

                                    </tr>
                                    </tbody>

                                    @endforeach


                                </table>
                                </div>

                            </div>







                </div>             
            </div>

                
                <footer>
    
                <p class="copyright">© Department of Examination 2020</p>
                </footer>

</body>
</html>