@extends('layouts.adminApp')
@section('content')
    <h3>{{$posts->name}}</h3>
    <img style="width:50%" src="/storage/cover_image/{{$posts->cover_image}}">
    <br>
    <div>
        {{$posts->description}}
    </div>
    <hr>
<small> Ditambahkan Pada : {{$posts->created_at}}</small>
<hr>
<a href="/posts/{{$posts->id}}/edit" class="btn btn-dark">Edit</a>
{!! Form::open(['action'=>['PostsController@destroy',$posts->id],'method'=>'POST','class'=>'float-right'])!!}
    {{Form::hidden('_method','DELETE')}}
    {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
{!! Form::close()!!}

@endsection