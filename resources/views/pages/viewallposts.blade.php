@extends('layouts.app')

@section('content')

@if(count($memberspost) > 0)
    <h1 class="text-center">myBlog Community Posts</h1>
    @foreach($memberspost as $memberposts)
        <input class="well text-center col-md-12">
            <input class="card card-default mb-5">
                <h3 href="{{ route('viewall', $memberposts->id)}}">{{$memberposts->post}}</h3>
                <p>by user {{$memberposts->user->name}} </p>
            </input>
        </div>
    @endforeach 
@else
    <p>no members</p>
@endif
@endsection