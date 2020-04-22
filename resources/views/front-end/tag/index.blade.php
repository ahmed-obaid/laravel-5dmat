@extends('layouts.app')

@section('title')
{{$tag->name}}
@endsection

@section('content')
 <div class='section section-buttons '>
   <div class='container'>
     <div class='title'>
     
        <h2> {{$tag->name}}</h2>
     </div>
     <div class='row'>
            @foreach($videos as $video)
            @if($video->published==1)
            
                <div class='col-lg-4'>
                <div class="card" style="width: 20rem;">
            <a href='{{route("frontend.videoshow",["id"=>$video->id])}}'title='{{$video->name}}' ><img class="card-img-top" style='height:200px; width:225px; ' src="{{url('uploads/'.$video->image)}}" alt="Card image cap"></a>
            <div class="card-body">
                <p class="card-text">
                     <a href='{{route("frontend.videoshow",["id"=>$video->id])}}' title='{{$video->name}}'>
                       {{$video->name}}
                     </a>
                </p>
                <small> {{$video->created_at}}  </small>
             </div>
        </div>
                        
                </div>
                @endif
            @endforeach
     </div>
     <div class='row'>
         <div class='col-lg-4'>
      
         </div>

      </div>
 </div>
 
 
 </div>
@endsection
