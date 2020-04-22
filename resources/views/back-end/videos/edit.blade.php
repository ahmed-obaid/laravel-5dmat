@extends('back-end.layout.app')
 

 @section('title')
         {{$pagetitle}}
 @endsection

 @section('content')

 @component('back-end.layout.header' )

  @slot('nav_title')
   
  {{$pagetitle}}
  @endslot


@endcomponent

@component('back-end.layout.shared.edit',['pagetitle'=>$pagetitle,'pagedesc'=>$pagedesc] )

@slot('slot')
 <div class="card-body">
                       <form action='{{route("videos.update",["id"=>$row->id])}}' method='post' enctype='multipart/form-data'>
                       {{method_field('put')}}
                         @include('back-end.'.$folder.'.forme')
                                  
                    
                            <button type="submit" class="btn btn-primary pull-right">update video</button>
                           <div class="clearfix"></div>
                      </form>
                    </div>


               
@php $url=getyoutubeid($row->youtube) @endphp
@if($url)
<iframe width="260" height="250" src="https://www.youtube.com/embed/{{$url}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

 @endif
 <img src='{{url("uploads/".$row->image)}}' width='250'>



@endslot

 
@endcomponent


@component('back-end.layout.shared.edit',['pagetitle'=>'comments','pagedesc'=>'controll comments'] )

@include('back-end.comments.create')


@include('back-end.comments.index')
 
@endcomponent
 @endsection

