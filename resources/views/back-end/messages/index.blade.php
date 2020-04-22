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
                         email
                        </th>
                        
                        <th>
                         controll
                        </th>
                         
                      </thead>
                      <tbody>
      @foreach($rows as $row)
                            <tr>
                              <td>{{$row->id}}</td>
                              <td>{{$row->name}}</td>
                              <td>{{$row->email}}</td>
                             
                               
                              <td class="td-actions text-right">
                                  @include('back-end.messages.buttons.edit')  
                                  @include('back-end.messages.buttons.delete')  
                              </td>                
                              
                            
                            </tr>


        @endforeach
                         </tbody>
                    </table>

                        
                        
                         @endslot
 
 
 @endcomponent
 {!!$rows->links()!!}




 @endsection

