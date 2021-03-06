<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Paper Bundle</title>
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
                          
                         
                    <div class="text-center">
                        <h1>Generate QR code</h1>

                        <form action="select_details" method="get" class="form-group form_dec">
                                {{csrf_field()}}
                                
                                        <div class="checkbox">
                                        <label><input type="checkbox" value="1" name="ol" class="" >O/L</label>
                                        </div>
                                        <div class="checkbox">
                                        <label><input type="checkbox" value="2" name="al" class="">A/L</label>
                                        </div>
                                
                                
                                        <input style="width:200px" type="number" name="year" value="2020">
                                        <br>
                                        <br>
                                        <input type="submit" value="Submit" class="btn btn-primary">
                                </form> 

                            <div class="row">
                            

                                <div class="col-md-12">

                                <div class="p-3 mb-2 bg-light text-dark"><b>Table {{$exam_name}}</b></div>
                                    <table class="table table-dark">
                                    <thead>
                                    <tr>
                                    <th>Bundle Number</th>
                                    <th>Paper Quantity</th>
                                    <th>Year</th>
                                    <th>District</th>
                                    <th>Writing Place</th>
                                    <th>Selected Medium</th>
                                    <th>Subject</th>
                                    <th>Action</th>
                                    <th>Generate QR</th>
                                   <!-- <th>Select</th>-->
                                    </tr>
                                    </thead>
                                    @foreach($table_data as $data)
                                    <tbody>
                                    <tr>
                                    
                                    <td>{{$data->bundle_number}}</td>
                                    <td>{{$data->paper_quntity}}</td>
                                    <td>{{$data->year}}</td>
                                    <td>{{$data->distric}}</td>
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
                                    <a href="/genarate_qr_code_page/{{$data->id}}/{{$data->exam_type}}"><button class="btn btn-warning">Generate QR</button></a>
                                    </td>
                                    
                                   <!-- <td>

                                    <a href="/select_marking_place/{{$data->year}}/{{$data->paper_quntity}}/{{$data->distric}}/{{$data->medium}}/{{$data->subject}}/{{$data->exam_type}}"><button type="button" class="btn btn-info">Marking Place</button></a>
                                    </td>-->
                                    <td>
                                   
                                   <a href="/edit_paper_bundle_data/{{$data->id}}/{{$data->exam_type}}"><button type="button" class="btn btn-light">Edit</button></a>
                                  
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


                <footer>
    
                <p class="copyright">?? Department of Examination 2020</p>
                </footer>

</body>
</html>