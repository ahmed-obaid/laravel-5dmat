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
                       
                       
          @include('back-end.'.$folder.'.forme')
                                                                                                         
         
</div>
   
@endslot

 
@endcomponent
 


 @endsection

