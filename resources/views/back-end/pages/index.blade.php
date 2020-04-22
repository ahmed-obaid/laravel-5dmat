@extends('back-end.layout.app')
 @section('content')

 @component('back-end.layout.header' )

  @slot('nav_title')
   
  {{$pagetitle}}
  @endslot


@endcomponent

 


@component('back-end.layout.shared.table',['pagetitle'=>$pagetitle ,'pagedesc'=>$pagedesc] )

@slot('addbutton')
<div class="col-md-4 text-right">
 <a href="{{route($routename.'.create')}}" class="btn btn-white btn-round ">add page</a><div class="ripple-container"></div></a>

 </div>
 @endslot

 @slot('table')

 <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>
                          ID
                        </th>
                        <th>
                          Name
                        </th>
                         
                         
                        <th>
                          description
                        </th>
                        <th>
                          meta_keywords
                        </th>
                        <th>
                          meta_desc
                        </th>
                        <th class='text-right'>
                          controller
                        </th>
                      </thead>
                      <tbody>
      @foreach($rows as $row)
                            <tr>
                              <td>{{$row->id}}</td>
                              <td>{{$row->name}}</td>
                              <td>{{$row->desc}}</td>
                              <td>{{$row->meta_keywords}}</td>
                              <td>{{$row->meta_desc}}</td>
                              <td class="td-actions text-right">
                                  @include('back-end.users.buttons.edit')  
                                  @include('back-end.users.buttons.delete')  
                              </td>                
                              
                            
                            </tr>


        @endforeach
                         </tbody>
                    </table>

                        
                        
                         @endslot
 
 
 @endcomponent
 {!!$rows->links()!!}




 @endsection

