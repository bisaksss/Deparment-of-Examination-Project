<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marking Places</title>
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
                                        <a href="/set_place_to_marking"><button type="button" class="btn btn-light">Back</button></a>

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
                    </div>
                </div>
            </nav>

            <main class="py-4">
                @yield('content')
            </main>
    </div>


<div class="container">


    <div class="text-center">

    <h1>Marking Places</h1>

    <table class="table table-dark">
                                    <tr>
                                    <th>ID</th>
                                    <th>Distric</th>
                                    <th>Place</th>
                                    <th>Medium</th>
                                    <th>Subject</th>

                                    <th>Paper Quntity</th>
                                    <th>Year</th>
                                    </tr>
                                    @foreach($marking_place_data as $data)
                                    <tr>
                                    <td> {{$data->id}}</td>
                                    <td> {{$data->distric}}</td>
                                    <td> {{$data->place}}</td>
                                    <td> {{$data->medium}}</td>
                                    <td> {{$data->subject}}</td>
                                    <td> {{$data->paper_quntity}}</td>
                                    <td> {{$data->year}}</td>
                                    <td>
                                    <a href="/delete_marking_place/{{$data->id}}"><button type="button" class="btn btn-danger">Delete</button></a>
                                    </td>
                                    </tr>
                                    @endforeach
    </table>



    </div>


</div>



    
</body>
</html>