@extends('layouts.app')

@section('title')
{{$skill->name}}
@endsection

@section('content')
 <div class='section section-buttons "'>
   <div class='container'>
     <div class='title'>
     
        <h2> {{$skill->name}}</h2>
     </div>
          @include('front-end.shared.video-row')
     </div>
 </div>
 
 
 </div>
@endsection
