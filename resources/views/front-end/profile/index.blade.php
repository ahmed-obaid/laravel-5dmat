@extends('layouts.app')

@section('title')
{{$user->name}}
@endsection

@section('content')

<div class="section profile-content" style='margin-top:120px'>
    <div class="container">
      <div class="owner">
        <div class="avatar">
          <img src="frontend/assets/img/faces/joe-gardner-2.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive">
        </div>
        <div class="name">
          <h4 class="title"> {{$user->name}}
            <br>
          </h4>
          <h6 class="description">{{$user->email}} </h6>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 ml-auto mr-auto text-center">
          <p>An artist of considerable range, Jane Faker — the name taken by Melbourne-raised, Brooklyn-based Nick Murphy — writes, performs and records all of his own music, giving it a warm, intimate feel with a solid groove structure. </p>
          <br>
          <btn class="btn btn-outline-default btn-round"><i class="fa fa-cog"></i> Settings</btn>
        </div>
      </div>
      <br>
      <div class="nav-tabs-navigation">
        <div class="nav-tabs-wrapper">
          <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" data-toggle="tab" href="#follows" role="tab">Follows</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#following" role="tab">Following</a>
            </li>
          </ul>
        </div>
      </div>
      <!-- Tab panes -->
      <div class="  nav-tabs-navigation">
        <div class="tab-pane active" id="follows" role="tabpanel">
          <div class="row">
            <div class="col-md-6 ml-auto mr-auto">
              <ul class="list-unstyled follows">
                <li>
                  <div class="row">
                    <div class="col-lg-2 col-md-4 col-4 ml-auto mr-auto">
                      <img src="../assets/img/faces/clem-onojeghuo-2.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                    </div>
                    <div class="col-lg-7 col-md-4 col-4  ml-auto mr-auto">
                      <h6>Flume
                        <br>
                        <small>Musical Producer</small>
                      </h6>
                    </div>
                    <div class="col-lg-3 col-md-4 col-4  ml-auto mr-auto">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input class="form-check-input" type="checkbox" value="" checked="">
                          <span class="form-check-sign"></span>
                        </label>
                      </div>
                    </div>
                  </div>
                </li>
                <hr>
                <li>
                  <div class="row">
                    <div class="col-lg-2 col-md-4 col-4 mx-auto ">
                      <img src="../assets/img/faces/ayo-ogunseinde-2.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                    </div>
                    <div class="col-lg-7 col-md-4 col-4">
                      <h6>Banks
                        <br>
                        <small>Singer</small>
                      </h6>
                    </div>
                    <div class="col-lg-3 col-md-4 col-4">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input class="form-check-input" type="checkbox" value="">
                          <span class="form-check-sign"></span>
                        </label>
                      </div>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="tab-pane text-center" id="following" role="tabpanel">
          <h3 class="text-muted">Not following anyone yet :(</h3>
          <button class="btn btn-warning btn-round">Find artists</button>
        </div>
<br><br>
        <!--============== update profile===================  -->
        <button class="btn btn-warning btn-round" onclick="$('#update').show()">update profil</button>
        <br><br>
        @if(auth()->user() && $user->id ==auth()->user()->id )
   
      <div id='update'style='display:none' >
         
      <form  class=" text-right" action='{{route("profile.update",["id"=>auth()->user()->id])}}'method='post'>
        {{csrf_field()}}
                    <div class="row ">
                      <div class="col-md-6">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">user Name</label>
                          <input value='{{isset($user)?$user->name:""}}' name='name' type="text" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class='row '>
                      <div class="col-md-6">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating ">email</label>
                          <input value='{{isset($user)?$user->email:""}}' name='email' type="text" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class='row'>
                      <div class="col-md-6">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">password</label>
                          <input value=' '  name='password' type="password" class="form-control">
                        </div>
                      </div>
                    </div>
                     <button class='btn btn-primary' type='submit'>update</button>
                </form>


           </div>
      @endif
      </div>
   
   
    </div>

  </div>
  
     
     
         
    
      
    
    
 
 
@endsection
