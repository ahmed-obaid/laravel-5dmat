@extends('back-end.layout.app')
@php 
     $pagetitle='edit user';
      $d='here you can edit user'
 @endphp

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
                       <form action='{{route("users.update",["id"=>$row->id])}}' method='post'>
                       {{method_field('put')}}
                         @include('back-end.'.$folder.'.forme')
                                  
                    
                            <button type="submit" class="btn btn-primary pull-right">update user</button>
                           <div class="clearfix"></div>
                      </form>
                    </div>
   
@endslot

 
@endcomponent
 


 @endsection

