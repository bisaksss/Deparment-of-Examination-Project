@extends('layouts.admin')

@section('content')
<div class="container">


    <div class="row justify-content-center">
        <!-- <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

               <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>-->
             
                <div class="container_btn_img">
                    <img src="img/new_exam.jpg" alt="Snow" style="width:95%">
                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">New Exam</button>
                        <div class="dropdown-menu">
                        <a class="dropdown-item" href="/ol_paper_bundel">O/L</a>
                        <div role="separator" class="dropdown-divider"></div>
                        <a class="dropdown-item" href="al_paper_bundel">A/L</a>
          
                        </div>
                </div>

                <div class="container_btn_img">
                    <img src="img/set_marking_place.jpg" alt="Snow" style="width:100%">
                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Set places to Marking</button>
                        <div class="dropdown-menu">
                        <a class="dropdown-item" href="/set_place_to_marking_ol">O/L</a>
                        <div role="separator" class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/set_place_to_marking_al">A/L</a>
          
                        </div>
                </div>

                <div class="container_btn_img">
                    <img src="img/paper_bundel.jpg" alt="Snow" style="width:100%">
                    <a href="/genarate_qr_code"> <button type="button" class="btn btn-outline-secondary">Manage Paper Bundle</button></a>
                </div>

                <div class="container_btn_img">
                    <img src="img/mannage_user.jpg" alt="Snow" style="width:100%">
                    <a href="/genarate_qr_code"> <button type="button" class="btn btn-outline-secondary">Manage Users</button></a>
                </div>


                <div class="container_btn_img">
                    <img src="img/barcode_reader.jpg" alt="Snow" style="width:100%">
                    <a href="#"><button type="button" class="btn btn-outline-secondary">Read Barcode</button></a>
                </div>
            
                   <!-- <div class="input-group-prepend">
                        <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">New Exam</button>
                        <div class="dropdown-menu">
                        <a class="dropdown-item" href="/ol_paper_bundel">O/L</a>
                        <div role="separator" class="dropdown-divider"></div>
                        <a class="dropdown-item" href="al_paper_bundel">A/L</a>
          
                        </div>
                     </div>&nbsp;

                     <div class="input-group-prepend">
                        <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Set places to Marking</button>
                        <div class="dropdown-menu">
                        <a class="dropdown-item" href="/set_place_to_marking_ol">O/L</a>
                        <div role="separator" class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/set_place_to_marking_al">A/L</a>
          
                        </div>
                     </div>&nbsp;-->



                  
                  <!--  <a href="/genarate_qr_code"> <button type="button" class="btn btn-outline-secondary">Mannage Papper Bundle</button></a>&nbsp;
                    <a href="#"><button type="button" class="btn btn-outline-secondary">Read Barcode</button></a>&nbsp;-->
                    


       
    </div>
</div>

@endsection