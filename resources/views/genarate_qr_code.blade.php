<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Genarate QR Code</title>
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
                          
                         
                    <div class="text-center">
                        <h1>Genarate QR code & Marking Place Select</h1>

                        <form action="select_details" method="get" class="form-group">
                                {{csrf_field()}}
                                
                                        <div class="checkbox">
                                        <label><input type="checkbox" value="1" name="ol" class="" >O/L</label>
                                        </div>
                                        <div class="checkbox">
                                        <label><input type="checkbox" value="2" name="al" class="">A/L</label>
                                        </div>
                                
                                
                                        <input style="width:200px" type="number" name="year">
                                        <br>
                                        <br>
                                        <input type="submit" value="Submit" class="btn btn-primary">
                                </form> 

                            <div class="row">
                            

                                <div class="col-md-12">


                                    <table class="table table-dark">
                                    <thead>
                                    <tr>
                                    <th>Bundle Number</th>
                                    <th>Paper Quntity</th>
                                    <th>Year</th>
                                    <th>Writing Place</th>
                                    <th>Selected Medium</th>
                                    <th>Subject</th>
                                    <th>Action</th>
                                    <th>Genarate QR</th>
                                    <th>Marking Place</th>
                                    </tr>
                                    </thead>
                                    @foreach($table_data as $data)
                                    <tbody>
                                    <tr>
                                    
                                    <td>{{$data->bundle_number}}</td>
                                    <td>{{$data->paper_quntity}}</td>
                                    <td>{{$data->year}}</td>
                                    <td>{{$data->writing_place}}</td>
                                    <td>{{$data->medium}}</td>
                                    <td>{{$data->subject}}</td>

                                  
                                    <td>
                                    @if($data->is_complete)
                                    <a href="/mark_as_not_complete/{{$data->id}}/{{$data->exam_type}}"><button class="btn btn-secondary">Completed</button></a>
                                    @else
                                    <a href="/mark_as_complete/{{$data->id}}/{{$data->exam_type}}"><button class="btn btn-success">Mark As Complete</button></a>
                                   
                                    @endif
                                    </td>
                              
                                    <td>
                                    <button class="btn btn-warning">Genarate QR</button>
                                    </td>
                                    
                                    <td>

                                    <button type="button" class="btn btn-info">Marking Place</button>
                                    </td>

                                      <td>
                                   
                                    <a href="/delete_paper_bundle_data/{{$data->id}}/{{$data->exam_type}}"><button type="button" class="btn btn-danger">Delete</button></a>
                                   
                                    </td>            
                                    </tbody>
                                    </tr>
                                    @endforeach
                                    </table>
                                </div>
                            

                            </div>

                    </div>

                </div>




</body>
</html>