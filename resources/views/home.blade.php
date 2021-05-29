@extends('layouts.app')

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
             
  
            
                    <div class="input-group-prepend">
                        <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">New Exam</button>
                        <div class="dropdown-menu">
                        <a class="dropdown-item" href="/ol_paper_bundel">O/L</a>
                        <div role="separator" class="dropdown-divider"></div>
                        <a class="dropdown-item" href="al_paper_bundel">A/L</a>
          
                        </div>
                     </div>&nbsp;
                    <a href="/set_place_to_marking"><button type="button" class="btn btn-outline-secondary">Set places to Marking</button></a>&nbsp;
                    <a href="/genarate_qr_code"> <button type="button" class="btn btn-outline-secondary">Mannage Papper Bundle</button></a>&nbsp;
                    <a href="#"><button type="button" class="btn btn-outline-secondary">Read Barcode</button></a>&nbsp;
                    


       
    </div>
</div>
@endsection
