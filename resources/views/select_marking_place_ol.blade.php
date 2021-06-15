<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Marking Place</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
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

                                    <!--<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>-->

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
        <div class="text-center">
        <h1>Best Places To Mark Paper Bundle</h1>
        <h5>For Selected Distric</h5>
                <table class="table table-dark">

                <tr>
                
                <th>District</th>
                <th>Place</th>
                <th>Mark as Selected</th>
                <th>Genarate QR Code</th>
           
                </tr>
               

                @foreach($row_data as $data)
                @if($year== $data->year && $medium==$data->medium && $subject==$data->subject && $ppr_quntity <= $data->paper_quntity)
                
                <tr>
                <td>{{$data->distric}}</td>

                <td>{{$data->place}}</td>

                <td>
                 @if($data->is_complete)
                 <a href="/mark_as_not_select_ol/{{$data->id}}"><button class="btn btn-secondary">Selected</button></a>
                 
                @else
                 <a href="/mark_as_select_ol/{{$data->id}}"><button class="btn btn-success">Not Selected</button></a>
                                   
                 @endif
                </td>


                <td><a href="/generate_qr_code_ol_marking_place/{{$data->id}}"><button class="btn btn-danger">Genarate QR</button></a></td>

                </tr>
                
                @endif
                @endforeach

                </table>
        </div>
    </div>
    <footer>
    
    <p class="copyright">© Department of Examination 2020</p>
    </footer>
</body>
</html>