@extends('back-end.layout.app')
 

  

 @section('content')

 @component('back-end.layout.header' )

     @slot('nav_title')
   
         {{$pagetitle}}
     @endslot


 @endcomponent
 @component('back-end.layout.shared.edit',['pagetitle'=>$pagetitle,'pagedesc'=>$pagedesc] )



 @slot('slot')
 <div class="card-body">
    <form action='{{route("tags.store")}}' method='post'>
        @include('back-end.'.$folder.'.forme')
                                  
                    
       <button type="submit" class="btn btn-primary pull-right">add tag</button>
      <div class="clearfix"></div>
   </form>
 </div>
   
@endslot


 @endcomponent
 @endsection