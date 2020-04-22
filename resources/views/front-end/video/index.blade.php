@extends('layouts.app')

@section('title')
{{$video->name}}
@endsection

@section('content')
 <div class='section section-buttons "'>
   <div class='container'>
     <div class='title'>
     
        <h2> {{$video->name}}</h2>
     </div>
     <div class='row'>
         <div class='col-md-8'>               
        @php $url=getyoutubeid($video->youtube) @endphp
        @if($url)
        <iframe width="100%" height="500" src="https://www.youtube.com/embed/{{$url}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

        @endif
        </div>

     </div>
    <div class='row'>
       <div class='col-md-8'> 
           <p> by : {{$video->user->name}} </p>
           <p>{{$video->created_at}} </p>
           <p>{{$video->desc}} </p>
          <a href='{{route("front.category",["id"=>$video->category->id])}}'><p>{{$video->category->name}} </p></a> 

          

           <p>
           @foreach($video->tags as $tag)
             
              tags :  
              <a href='{{route("front.tag",["id"=>$tag->id])}}'> 
                  <span class='badge badge-pill badge-primary'>
                  {{$tag->name}}
                 </span>
              </a>

              @endforeach
           
           </p>
           
           <p>
              @foreach($video->skills as $skill)

              skills :
              <a href='{{route("front.skill",["id"=>$skill->id])}}'>
              <span class='badge badge-pill badge-info'> 
               {{$skill->name}} 
                </span>
                </a>

              @endforeach
           
           </p>
            

       </div>
       

      

    </div>
       

        <div class="card text-left">
            <div class="card-header card-header-primary">
               <h3>comments ({{count($video->comments)}}) </h3>
             </div>
            <div class="card-body">
        @foreach($video->comments as $comment)
                
                <div class='col-md-8'>
                  <i class='nc-icon nc-chat-33'></i> 
                  <a href='{{route("front.profile",["id"=>$comment->user->id,"slug"=>slug($comment->user->name)])}}'> {{$comment->user->name}}</a>
                 
                </div>
                <div class='col-md-8' id='comment'>
                   
                 <span> <i class='nc-icon nc-calendar-60'></i> {{$comment->created_at}} </span> 
                </div>
               <p> {{$comment->comment}} </p> 
               @if(auth()->user()) 
               @if((auth()->user()->group =='admin')|| (auth()->user()->id ==$comment->user->id))
                 <a href='' class='btn btn-outline-info btn-round'>edit</a>
                
                 <br>
               <div style='display:none'>
                 <form action='{{route("front.commentupdate",["id"=>$comment->id])}}' method='post'>
                  {{csrf_field()}}
                  <div class='form-group'>
                    <textarea name='comment' cols='30' rows='10'> </textarea><br>
                  </div>
                  <button type='submit' >edit</button>
                 </form>
               </div>
               @endif
               @endif


               @if(!$loop->last)<hr>
               @endif
               
        
        @endforeach
            </div>
            <div>
            @if(auth()->user())
                 <form action='{{route("front.commentadd",["videoid"=>$video->id])}}' method='post'>
                  {{csrf_field()}}
                  <div class='form-group'>
                  <label>add comment</label><br>
                    <textarea name='comment' cols='30' rows='10'> </textarea>
                  </div>
                  <button type='submit' class='btn btn-default'>add comment</button>
                 </form>
             @endif
               </div>
        </div>
    

























    </div>
 
 
 </div>
@endsection
