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