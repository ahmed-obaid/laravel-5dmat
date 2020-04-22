@extends('layouts.app')

@section('content')
 <div class='section section-buttons "'>
   <div class='container'>
     <div class='title'>
     
        <h2>latest videos</h2>
        @if(request()->has('search') && request()->get('search') !='')
       <p>   
         {{$no}} results for your search about <b>( {{request()->get('search')}}) <a href='{{route("home")}}'> back </a> </b>
       </p> 
        @endif

    

     </div>
      <div class='row'>
         @foreach($videos as $video)
       
                <div class='col-lg-4'>
                 @include('front-end.shared.video-card')   
                        
                </div>
        @endforeach
     </div>
     <div class='row'>
       <div class='col-lg-4'>
       {{$videos->links()}}
       </div>

     </div>
 </div>
 
 
 </div>
@endsection
