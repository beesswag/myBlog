@extends('layouts.app')

@section('content')

@if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif
    <div class="col-md-12 text-center well">
        <form action="{{route('poststore')}}" method="post">
            {{csrf_field()}}
            <label for="post">Create New Post</label><br>
            <textarea type="text" name="post" placeholder="Enter a new post" cols="30" rows="5"></textarea><br>
            <input type="submit" value="Add Post" class="btn btn-default btn-success">
        </form>
    </div>
    

@endsection