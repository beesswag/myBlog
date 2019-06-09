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
                  <label for="post">Comment</label><br>
                  <input type="text" name="comment" placeholder="Enter a new comment"><br>
                  <input type="hidden" name="post_id" value="{{$memberposts->id}}">
                  <input type="submit" value="Add comment" class="btn btn-default btn-success">
                </Form>
                @foreach($postcomment as $comments)
                    <p>{{$comments->comment}}</p>
                    <form action="{{route('remove',$comments->id)}}" method="post">
                        @csrf
                        {{method_field('DELETE')}}
                        <input type="submit" value="Delete my comment" class="btn btn-default btn-success">
                    </form>

                @endforeach                
            </div>

        </div>
    @endforeach
@else
    <p>no members</p>
@endif

@endsection
