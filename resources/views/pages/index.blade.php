@extends('layouts.app')

@section('content')
<div class="container">
        <ul class="nav navbar navbar-left d-flex d-inline-flex" style="width:100%">
            <li class="nav-item">
                    <h4>Product</h4>
            </li>

            <li class="nav-item" >
                    {{$posts->links()}}
            </li>
        </ul>

    <div class="m-1">
        @if(count($posts)>0)
            @foreach($posts as $post)
             <div style="width:21em;height:40em" class="card float-left m-4 ">
                    <img class="rounded mx-auto d-block mt-1" style="width:20em;height:20em"src="/storage/cover_image/{{$post->cover_image}}" class="card-img-top">
                    <div class="card-body d-flex flex-column">
                            <h3 class="card-title">{{$post->name}}</h3>
                            <p class="card-text">{{$post->description}}</p>
                            <h5 class="card-text">Price : {{$post->price}}</h5>
                            <a href="/transaction/{{$post->id}}" class="btn btn-primary  mt-auto">Add to cart</a>

                    </div>
                  </div>
            @endforeach
            <hr>
          
        @else
        <div class="alert alert-success" role="alert">
                <p>Tidak Ada Produk</p>
        </div>
        @endif


           
    </div>
@endsection
