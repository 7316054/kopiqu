@extends('layouts.adminApp')

@section('content')
    <h1>Add Product</h1>
    <hr>
    {!! Form::open(['action'=>'PostsController@store','method'=>'POST','enctype'=>'multipart/form-data']) !!}
        <div class="form-group">
            {{form::label('name','Name')}}
            {{form::text('name','',['class'=>'form-control','placeholder'=>'Name'])}}
        </div>

        <div class="form-group">
            {{form::label('description','Description')}}
            {{form::textarea('description','',['class'=>'form-control','maxlength'=>'100','placeholder'=>'Description(max 100 words)','style'=>'height:10em;'])}}
        </div>

        <div class="form-group">
            {{form::label('price','Price')}}
            {{form::number('price','',['class'=>'form-control','placeholder'=>'Price','min'=>'1'])}}
        </div>

        <div class="form-group">
            {{form::label('weight','Weight')}}
            {{form::number('weight','',['class'=>'form-control','placeholder'=>'Weight (Kg)','min'=>'1'])}}
        
        </div>
        <div class="form-group">
            {{Form::file('cover_image')}}
        </div>
       {{form::submit('Submit',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}

@endsection
