@extends('layouts.app')
<style>
    label{
        padding: 12px 20px;
        font-size: 20px;
        margin-right: 370px;
    }
    textarea{
        border-radius: 5px;
        font-size: 20px;
    }
    #btn1 {

        font-size: 16px;
        cursor: pointer;
        border: none;
        text-align: center;
        padding: 15px 32px;
        margin-bottom: 40px;

    }

    .di{
        display:inline-block;
        border-spacing: 20px;
    }

    .homeButton{

        font-size: 20px;
        cursor: pointer;
        display: inline-block;
        background-color: darkgray;
        border: none;
        padding: 15px 32px;
        text-align: center;
        font-weight: 200;
        margin-right: 370px;
    }

</style>
@section('content')
    <div class="col-md-12 text-center well">
        <form action="{{route('updating')}}" method="post">
            {{csrf_field()}}
            <label for="post">Edit your Post</label><br>
            <div class="di"><textarea type="text" name="post" cols="50" rows="2" required>{{$post[0]->post}}</textarea><br></div>
            <input type="hidden" name="id" value="{{ $post[0]->id}}" >
            <div class="di"><input type="submit" value="Edit Post" id="btn1" class="btn btn-default btn-success"></div>
        </form>
        <div class="homeButton"><a style="text-decoration: none;" href="{{route('home')}}">Home</a> </div>
    </div>
@endsection