<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mannage Paper Bundle</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
    <div id="app">
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class="container">
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


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="text-center">


                         <h1 class="font-weight-normal"> Set Places To Marking </h1>

                            <br>
                            <br>
                                 <div class="card">
                                 <div class="card-header text-left font-weight-bold">Add Details</div>
                                    <div class="card-body">
                                       
                                            <form action="/set_marking_place" method="post">
                                            
                                            {{csrf_field()}}

                                            <div class="form-group row">

                                                    <!--<label for="distric" class="col-md-4 col-form-label text-md-right">Distric :</label>
                                                    <div class="col-md-6">
                                                    <input type="text" name="distric" class="form-control">
                                                    </div>-->

                                              
                                                        <label for="distric" class="col-md-4 col-form-label text-md-right">Distric</label>
                                                        <div class="col-md-6">
                                                        <select class="form-control" id="distric" name="distric">
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

                                                    <label for="place" class="col-md-4 col-form-label text-md-right">Place :</label>
                                                    <div class="col-md-6">
                                                    <input type="text" name="place" class="form-control" value="">
                                                    </div>
                                                 

                                                    <br>
                                                    <br>

                                                    <label for="medium" class="col-md-4 col-form-label text-md-right">Medium</label>
                                                        <div class="col-md-6">
                                                        <select class="form-control" id="medium" name="medium">
                                                        <option>Sinhala</option>
                                                        <option>Tamil</option>
                                                        <option>English</option>
                                                        </select>
                                                        </div>

                                                    <br>
                                                    <br>

                                                    <label for="subject" class="col-md-4 col-form-label text-md-right">Subject :</label>
                                                    <div class="col-md-6">
                                                    <input type="text" name="subject" class="form-control" value="">
                                                    </div>
                                                 

                                                    <br>
                                                    <br>
                                                
                                                    <label for="paper_quntity" class="col-md-4 col-form-label text-md-right">Paper Quntity :</label>
                                                    <div class="col-md-6">
                                                    <input type="number" name="paper_quntity" class="form-control">
                                                    </div>


                                                    <br>
                                                    <br>

                                                    <label for="year" class="col-md-4 col-form-label text-md-right">Year :</label>
                                                    <div class="col-md-6">
                                                    <input type="number" name="year" class="form-control" value="2020">
                                                    </div>

                                                    <br>
                                                    <br>

                                            </div>


                                            <button type="submit" class="btn btn-primary">Submit</button>
                                            &nbsp;
                                            <button type="reset" value="Reset" class="btn btn-warning">Clear</button>
                                            &nbsp;
                                            <a href="/show_marking_place_database"><button type="button" class="btn btn-secondary">Show Database</button></a>

                                            </form>
                                     </div>
                                </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>