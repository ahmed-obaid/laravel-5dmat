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
 <a href="{{route($routename.'.create')}}" class="btn btn-white btn-round ">add video</a><div class="ripple-container"></div></a>

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
                          category
                        </th>
                        <th>
                          user
                        </th>
                        <th>
                          published
                        </th>
                         
                         
                        <th>
                          description
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
                          
                              <td>{{$row->category->name}}</td>
                              <td>{{$row->user->name}}</td>
                              <td>{{$row->published}}</td>
                              <td>{{$row->desc}}</td>
                              
                              
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

