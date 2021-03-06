
<!DOCTYPE html>
<html lang="en">
<head>

     <!-- CSRF Token -->
     <meta name="csrf-token" content="{{ csrf_token() }}">


     <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A/L paper bundle</title>
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
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="text-center">


                         <h1 class="font-weight-normal">  G.C.E(A/L) </h1>
                         <h3 class="font-weight-normal text-danger"> First Add Level 2 Districts </h3>
                         <h5 class="font-weight-normal text-secondary"> Colombo/Gampaha/Kandy/Matara/<br>Galle/Kurunagala/Rathnapura </h5>

                            <br>
                            <br>
                                 <div class="card">
                                 <div class="card-header text-left font-weight-bold">A/L Paper bundle Details</div>
                                    <div class="card-body">
                                       
                                            <form action="/add_al_paper_details" method="post">
                                            
                                            {{csrf_field()}}

                                            <div class="form-group row">

                                                    <label for="bundle_number" class="col-md-4 col-form-label text-md-right">Bundle Number :</label>
                                                    <div class="col-md-6">
                                                    <input type="number" name="bundle_number" class="form-control" required>
                                                    </div>

                                                    <br>
                                                    <br>

                                                    <label for="paper_quntity" class="col-md-4 col-form-label text-md-right">Paper Quantity :</label>
                                                    <div class="col-md-6">
                                                    <input type="number" name="paper_quntity" class="form-control" required>
                                                    </div>

                                                    <br>
                                                    <br>
                                                
                                                    <label for="year" class="col-md-4 col-form-label text-md-right">Year :</label>
                                                    <div class="col-md-6">
                                                    <input type="number" name="year" class="form-control" value="2020" required>
                                                    </div>

                                                    <br>
                                                    <br>


                                                    <label for="distric" class="col-md-4 col-form-label text-md-right">District</label>
                                                        <div class="col-md-6">
                                                        <select class="form-control" id="distric" name="distric" required>
                                                        <option>Ampara</option>
                                                        <option>Anuradhapura</option>
                                                        <option>Badulla</option>
                                                        <option>Batticaloa</option>
                                                        <option>Colombo</option>
                                                        <option>Galle</option>
                                                        <option>Gampaha</option>
                                                        <option>Hambantota</option>
                                                        <option>Jaffna</option>
                                                        <option>Kalutara</option>
                                                        <option>Kandy</option>
                                                        <option>Kegalle</option>
                                                        <option>Kilinochchi</option>
                                                        <option>Kurunegala</option>
                                                        <option>Mannar</option>
                                                        <option>Matale</option>
                                                        <option>Matara</option>
                                                        <option>Monaragala</option>
                                                        <option>Mullaitivu</option>
                                                        <option>Nuwara Eliya</option>
                                                        <option>Polonnaruwa</option>
                                                        <option>Puttalam</option>
                                                        <option>Ratnapura</option>
                                                        <option>Trincomalee</option>
                                                        <option>Vavuniya</option>
                                                        
                                                        </select>
                                                        </div>

                                                        <br>
                                                        <br>


                                                    <label for="writing_place" class="col-md-4 col-form-label text-md-right">Writing Place :</label>
                                                    <div class="col-md-6">
                                                    <input type="text" name="writing_place" class="form-control" required>
                                                    </div>

                                                    <br>
                                                    <br>


                                                   
                                                    <label for="medium"  class="col-md-4 col-form-label text-md-right">Select Medium</label>
                                                    <div class="col-md-6">
                                                    <select class="form-control" id="medium" name="medium" required>
                                                    <option>Sinhala</option>
                                                    <option>Tamil</option>
                                                    <option>English</option>
                                                    
                                                    </select>
                                                    </div>
                                                    

                                                    <br>
                                                    <br>


                                                    <label for="subject" class="col-md-4 col-form-label text-md-right">Subject :</label>
                                                    <div class="col-md-6">
                                                    <input type="text" name="subject" class="form-control" required>
                                                    </div>

                                                    <br>
                                                    <br>

                                                    

                                            </div>


                                            <button type="submit" class="btn btn-primary">Submit</button>
                                            &nbsp;
                                            <button type="reset" value="Reset" class="btn btn-warning">Clear</button>

                                            </form>
                                     </div>
                                </div>
                </div>
            </div>
        </div>
    </div>
    <footer>
    
    <p class="copyright">?? Department of Examination 2020</p>
    </footer>
</body>
</html>