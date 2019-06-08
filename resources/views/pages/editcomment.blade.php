@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">Edit </div>

                <div class="card-body default mb-10">
                    <form action="{{route('post.comment', $comment->id)}}" method="post">
                        {{csrf_field()}}
                        {{method_field('PUT')}}
                        <div class="form-group"> 
                            <input type="text" value="{{ $comment->comment }}" name="comment" class="form-control @error('comment') is-invalid @enderror"  required>
                        </div>
                        @error('post')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <input type="submit" value="Edit comment">
                    </form>
                </div>

            </div>
        </div>

    </div>
</div>
@endsection
