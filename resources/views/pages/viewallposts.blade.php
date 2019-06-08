@extends('layouts.app')

@section('content')

@if(count($memberspost) > 0)
    <h1 class="text-center">myBlog Community Posts</h1>
    @foreach($memberspost as $memberposts)
        <div class="well text-center col-md-12">
            <div class="card card-default mb-5">
                <h3 href="{{ route('viewall', $memberposts->id)}}">{{$memberposts->post}}</h3>
                <p>by user {{$memberposts->user->name}} </p>
                <Form action ="{{route('commenting')}}" method='post'>
                  {{csrf_field()}}
                  <label for="post">Comment</label><br>
                  <input type="text" name="comment" placeholder="Enter a new comment"><br>
                  <input type="hidden" name="post_id" value="{{$memberposts->id}}">
                  <input type="submit" value="Add comment" class="btn btn-default btn-success">
                </Form>
                @foreach($postcomment as $comments)
                    <p>{{$comments->comment}}</p>

                    <td ><a href="{{route('editcom',$comments->id)}}"><button class="btn btn-default btn-primary"> Edit comment</button></a></td>
 

                @endforeach                
            </div>
        </div>
    @endforeach
@else
    <p>no members</p>
@endif

@endsection
