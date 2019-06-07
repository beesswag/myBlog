@extends('layouts.app')
<style>
    table tr td{
        padding:20px;
    }
</style>
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
                    <div class="well default mt-2"><a href="{{route('viewall')}}"><button class="btn btn-dafault btn-secondary">View all community Posts</button></a></div>
                    </div>


                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-body default mt-10">
                    <table>
                        <div class="well">
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{$post->post}}</td>
                                    <td ><a href="{{route('edit',$post->id)}}"><button class="btn btn-default btn-primary"> Edit the post</button></a></td>
                                    <td >
                                        <form action="{{route('destroy', $post->id)}}" method="post">
                                            {{method_field('DELETE')}}
                                            @csrf
                                            <a href=""><button class="btn btn-default btn-danger">Delete the post</button></a>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </div>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
