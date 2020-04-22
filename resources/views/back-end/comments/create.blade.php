
<form action='{{route("comment.store")}}' method='post'>
{{csrf_field()}}
@include('back-end.comments.forme')
<input type='hidden' value='{{$row->id}}' name='video_id'>
 <button type='submit' class='btn btn-primary'>add comment</button>
</form>