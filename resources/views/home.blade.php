@extends('layouts.app')

@section('content')
<div class="container">
<form action="" method="">
<div class="checkbox">
      <label><input type="checkbox" value="" name="ol" class="">O/L</label>
    </div>
    <div class="checkbox">
      <label><input type="checkbox" value="" name="al" class="">A/L</label>
    </div>
 
  
  <input style="width:200px" type="text" name="year" class="form-control" value="Year,Ex:2020/2019/2018">
  <br>
  <input type="submit" value="Submit">
</form> 
<br>
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
                    <a href="/mannage_paper_bundle"><button type="button" class="btn btn-outline-secondary">Set places to Marking</button></a>&nbsp;
                    <a href="/genarate_qr_code"> <button type="button" class="btn btn-outline-secondary">Mannage Papper Bundle</button></a>&nbsp;
                    <a href="#"><button type="button" class="btn btn-outline-secondary">Read Barcode</button></a>&nbsp;
                    


       
    </div>
</div>
@endsection
