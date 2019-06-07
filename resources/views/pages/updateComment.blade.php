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

</style>
@section('content')
    <div class="col-md-12 text-center well">
        <form action="{{route('updating.comment')}}" method="post">
            {{csrf_field()}}
            <label for="comment">Edit your Post</label><br>
            <div class="di"><textarea type="text" name="comment" cols="25" rows="1" required>{{$comment[0]->comment}}</textarea><br></div>
            <input type="hidden" name="id" value="{{ $comment[0]->id}}" >
            <div class="di"><input type="submit" value="done" id="btn1" class="btn btn-default btn-success"></div>
        </form>
        <a style="text-decoration: none;" href="{{route('home')}}">
        <button>Back</button></a>
    </div>
@endsection