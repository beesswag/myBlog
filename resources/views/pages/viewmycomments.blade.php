@extends ('layouts.app')


@section('content')

 @foreach($mycomment as $mycomments)
    @if($mycomments->user_id == Auth::user()->id)
        <div class="well mb-2">
            <div class="col-md-12 mb-5">
                <p> 
                    you commented "{{$mycomments->comment}}" on the post
                    @foreach($memberspost as $post)
                        @if($mycomments->post_id == $post->id)
                            <p> "{{$post->post}}" by {{$post->user->name}}</p>
                        @endif
                    @endforeach
                    on {{$mycomments->created_at}}
                </p> 
                <a href="{{route('editcomment',$mycomments->id)}}"><button>edit comment</button></a>
                <button>delete comment</button>
            </div>
            
        </div>
        
    @endif
@endforeach
@endsection