@extends('layouts.app')


@section('title','home')
 

@section('header')

<div class="page-header section-dark" style="background-image: url({{asset('frontend/img/antoine-barres.jpg')}})">
    <div class="filter"></div>
    <div class="content-center">
      <div class="container">
        <div class="title-brand">
          <h1 class="presentation-title"> videos-web.com</h1>
          <div class="fog-low">
            <img src="{{asset('frontend/img/fog-low.png')}}" alt="">
          </div>
          <div class="fog-low right">
            <img src="{{asset('frontend/img/fog-low.png')}}" alt="">
          </div>
        </div>
        <h2 class="presentation-subtitle text-center">showing videos </h2>
      </div>
    </div>
    
    <div class="moving-clouds" style="background-image: url({{asset('frontend/img/clouds.png')}}) "></div>
    <h6 class="category category-absolute">Designed and coded by
      <a href="https://www.creative-tim.com" target="_blank">
        <img src="{{asset('frontend/img/creative-tim-white-slim2.png')}}" class="creative-tim-logo">
      </a>
    </h6>
  </div>
  
 
  
  
  
<!--=========================  section2===================  -->

 <div class="section text-center">
   <div class="container">
        <div class="row">
          <div class="col-md-8 ml-auto mr-auto">
            <h2 class="title">Latest videos</h2>
            <h5 class="description">keep learning , latest videos based on published day</h5>
            <br>
            
          </div>
        </div>
        <br>
        <br>
        
          @include('front-end.shared.video-row')
             <br>
         <a href="{{route('home')}}" class="btn btn-link btn-danger">more videos</a>
       
      </div>
    </div>
  <!-- ==========  ==================    -->
    <div class="section section-dark text-center">
      <div class="container">
        <h2 class="title">our number</h2>
        <div class="row">
          <div class="col-md-4">
            <div class="card card-plain">
               
              <div class="card-body">
                <a href="#paper-kit">
                  <div class="author">
                    <h2 class="card-title"> {{$video_count}}</h2>
                    <h4 class="card-category"> our videos </h4>
                  </div>
                </a>
                 
              </div>
               
            </div>
          </div>
          <div class="col-md-4">
            <div class="card  card-plain">
               
              <div class="card-body">
                <a href="#paper-kit">
                  <div class="author">
                    <h2 class="card-title">{{$comment_count}} </h2>
                    <h4 class="card-category"> comments  </h4>
                  </div>
                </a>
                 
              </div>
               
            </div>
          </div>
          <div class="col-md-4">
            <div class="card card-plain">
               
              <div class="card-body">
                <a href="#paper-kit">
                  <div class="author">
                    <h2 class="card-title">{{$tag_count}} </h2>
                    <h4 class="card-category"> tags </h4>
                  </div>
                </a>
                 
              </div>
               
            </div>
          </div>
           
          
        </div>
      </div>
    </div>
<!--  ================== contact us =================== -->
<div class="section landing-section">
      <div class="container">
        <div class="row">
          <div class="col-md-8 ml-auto mr-auto">
            <h2 class="text-center">contact us</h2>
            <form class="contact-form" action='{{route("contact.store")}}' method='post'>
             {{csrf_field()}}
              <div class="row">
                <div class="col-md-6">
                  <label>Name</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="nc-icon nc-single-02"></i>
                      </span>
                    </div>
                    <input type="text" name='name' required class="form-control @error('name') is-invalid @enderror" placeholder="Name">
                    @error('name')
                      <span class='invalid-feedback'role='alert'>
                        {{$message}}
                 
                     </span>
                    @enderror
                  </div>
                </div>
                <div class="col-md-6">
                  <label>Email</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="nc-icon nc-email-85"></i>
                      </span>
                    </div>
                    <input type="email" required name='email' class="form-control @error('email') is-invalid @enderror" placeholder="Email">
                    @error('email')
                      <span class='invalid-feedback'role='alert'>
                        {{$message}}
                 
                     </span>
                    @enderror
                  </div>
                </div>
              </div>
              <label>Message</label>

              <textarea class="form-control @error('message') is-invalid @enderror" required name='message' rows="4" placeholder="Tell us your thoughts and feelings..."></textarea>
              @error('message')
                 <span class='invalid-feedback'role='alert'>
                    {{$message}}
                 
                 </span>
              @enderror
              <div class="row">
                <div class="col-md-4 ml-auto mr-auto">
                  <button type='submit' class="btn btn-danger btn-lg btn-fill">Send Message</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>







@endsection



