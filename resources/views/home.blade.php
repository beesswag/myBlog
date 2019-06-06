@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    <div class="well"><h4>hi {{ Auth::user()->name }}</h4></div>

                    <div class="well mt-10">
                    <form action="{{route('post.store')}}" method="post">
                        {{csrf_field()}}
                        <label for="post">Create New Post</label><br>
                        <textarea type="text" name="post" placeholder="Enter a new post" cols="30" rows="5"></textarea><br>
                        <input type="submit" value="Add Post" class="btn btn-default btn-success">
                    </form>
                    
                    </div>


                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-body default mt-10">
                    <div class="well">
                        @foreach($posts as $post)
                        <form action="" method="post">
                        <p>{{$post->post}} 
                            <div class="col-md-8">
                                <a href=""><button class="btn btn-default btn-primary"> Edit Activity</button></a>
                                <a><button class="btn btn-default btn-danger" type="submit">Delete</button></a>
                            </div>
                            
                        </p>
                            {{csrf_field()}}
                            {{method_field('DELETE')}}
                            
                        </form>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
