@extends('layouts.adminApp')

@section('content')
    <h1>Edit Product</h1>
    <hr>
    {!! Form::open(['action'=>['PostsController@update',$posts->id],'method'=>'POST','enctype'=>'multipart/form-data']) !!}
        <div class="form-group">
            {{form::label('name','Name')}}
            {{form::text('name',$posts->name,['class'=>'form-control','placeholder'=>'Name'])}}
        </div>

        <div class="form-group">
            {{form::label('description','Description')}}
            {{form::textarea('description',$posts->description,['class'=>'form-control','maxlength'=>'100','placeholder'=>'Description(max 100 words)','style'=>'height:10em;'])}}
        </div>

        <div class="form-group">
            {{form::label('price','Price')}}
            {{form::number('price',$posts->price,['class'=>'form-control','placeholder'=>'Price','min'=>'1'])}}
        </div>

        <div class="form-group">
            {{form::label('weight(Kg)','Weight')}}
            {{form::number('weight',$posts->weight,['class'=>'form-control','placeholder'=>'Weight','min'=>'1'])}}
        
        </div>
        <div class="form-group">
                {{Form::file('cover_image')}}
        </div>
        {{form::hidden('_method','PUT')}}
       {{form::submit('Submit',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection
