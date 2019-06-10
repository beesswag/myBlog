@extends('layouts.app')

@section('content')

@if(count($memberspost) > 0)
    <h1 class="text-center">myBlog Community Posts</h1>
    @foreach($memberspost as $memberposts)
        <div>
                <h3 href="{{ route('viewall', $memberposts->id)}}">{{$memberposts->post}}</h3>
                <p>by user {{$memberposts->user->name}} </p>
            <div>
                <Form action ='{{route('commenting')}}' method='post'>
                  {{csrf_field()}}
                  <!-- <label for="post">Comment</label><br> -->
                  <div class="well mb-2"><input type="text" name="comment" placeholder="Comment"></div>
                  <input type="hidden" name="post_id" value="{{$memberposts->id}}">
                  <input type="submit" value="Add comment" class="btn btn-default btn-success">
                </Form>

                <div class="card default mt-2 m-2 p-1">
                    <div class="well">
                        @foreach($postcomment as $comments)
                            @if($memberposts->id == $comments->post_id)
                              @if($comments->user_id == Auth::id())
                                <p style="font-size:13px">{{$memberposts->user->name}} : {{$comments->comment}} </p>
                                <td ><a href="{{route('editcomment',$comments->id)}}"><button class="btn btn-default btn-primary"> Edit comment</button></a></td>
                                    <form action="{{route('remove',$comments->id)}}" method="post">
                                        @csrf
                                        {{method_field('DELETE')}}
                                        <input type="submit" value="Delete my comment" class="btn btn-default btn-success">
                                    </form>

                                @else
                                  <p style="font-size:13px">{{$memberposts->user->name}} : {{$comments->comment}} </p>
                                @endif
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    @endforeach
@else
    <p>no members</p>
@endif

@endsection
