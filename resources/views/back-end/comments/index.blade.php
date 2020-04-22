<div id='comments'></div>
@foreach($comments as $comment)
<hr>
<div class='row'>

  <div class='col-md-2'>
  {{$comment->user->name}}

  </div>
  <div class='col-md-8'>
   {{$comment->comment}}

  </div>
  <div class='col-md-2'>
    
    <td class="td-actions text-right">
        <a href='' type="button" rel="tooltip" title="" class="btn btn-white btn-link btn-sm" data-original-title="Edit comment">
        <i class="material-icons">edit</i>
        </a>
        <a href='{{route("comment.delete",["id"=> $comment->id])}}'type="button" rel="tooltip" title="" class="btn btn-white btn-link btn-sm" data-original-title="delete comment">
        <i class="material-icons">close</i>
        </a>
    </td>
  </div>
  </div>

  <div class='row'>
  <div class='col-md-12'>
 <form action='{{route("comment.update" ,["id"=> $comment->id])}}' method='post'>
        {{csrf_field()}}
          @include('back-end.comments.forme')
        <input type='hidden' value='{{$row->id}}' name='video_id'>
         <button type='submit' class='btn btn-primary'>update comment</button>
 </form>
 </div>
 </div>
 

@endforeach

