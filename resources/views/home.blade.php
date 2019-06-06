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

                    <div class="well"><h4>hi {{ Auth::user()->name }}</h4></div>

                    <div class="well">
                        <a href=""><button class="btn btn-default btn-primary">Add New Post</button></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-body default mt-10">
                    <div class="well">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
