@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header"> Edit Post</div>

                <div class="card-body default mb-10">
                    <form action="{{route('post.update', $post->id)}}" method="post">
                        {{csrf_field()}}
                        {{method_field('PUT')}}
                        <div class="form-group"> 
                            <input type="text" value="{{ $post->post }}" name="post" class="form-control @error('post') is-invalid @enderror"  required>
                        </div>
                        @error('post')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <input type="submit" value="Edit Post">
                    </form>
                </div>

            </div>
        </div>

    </div>
</div>
@endsection
