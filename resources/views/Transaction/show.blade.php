@extends('layouts.app')
@section('content')
    <h3>{{$posts->name}}</h3>
    <img style="width:50%" src="/storage/cover_image/{{$posts->cover_image}}">
    <br><br>
    <div>
        {{$posts->description}}
    </div>
    <hr>

    <h5 class="card-text">Price : {{$posts->price}} / pcs</h5>

    {!! Form::open(['action'=>'TransactionController@store','method'=>'POST','enctype'=>'multipart/form-data']) !!}
        <div class="form-group">
            {{form::label('jumlah','Jumlah')}}

            <ul class="nav navbar navbar-left d-flex  d-inline-flex">
                <li class="nav item">
                        {{form::number('jumlah','',['class'=>'form-control','placeholder'=>'pembelian','style'=>'width:10em'])}}
                </li>
                <li class="nav item ml-2 mt-4">
                    <p>pcs</p>
                </li>
            </ul>
           
        </div>
        {{form::hidden('id_produk',$posts->id)}}
       {{form::submit('add to chart',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
<hr>

@endsection