@extends('layouts.adminApp')

@section('content')
    <div class="container">
        <ul class="nav navbar navbar-left d-flex d-inline-flex" style="width:100%">
            <li class="nav-item">
                    <h4>Product</h4>
            </li>

            <li class="nav-item" >
                <h4><a class="nav-link" href="/posts/create"><i class="fa fa-plus-circle" style="color:black"></i>  Add Product</a></h4>
            </li>
        </ul>
            
             
    </div>
  
        <hr>

        @if(count($posts)>0)
            @foreach($posts as $post)
                <div class="card card-body bg-light m-2 ">
                        <div class="row">

                             
                           <img class="ml-3"style="width:10em" src="/storage/cover_image/{{$post->cover_image}}">
                             
        
                            <div class="col-md-6 col-sm-6 ml-5" >
                                    <h4><a style="color:black" href="/posts/{{$post->id}}">{{$post->name}}</a></h4>
                                    <p>{{$post->description}}</p>
                                    <p>Price : {{$post->price}}</p>
                                    <small>Added on {{$post->created_at}}</small>
                            </div>

                            <div class="cold-md-2 col-sm-2 mt-5 ">
                                    <button class="btn btn-dark pull-right"><a style="color:white"href="/posts/{{$post->id}}">View Details</button> 
                            </div>

                          
                        </div>
                       
                </div>
            @endforeach
            <br><br>
           
            <div class="d-flex justify-content-center">
                 {{$posts->links()}}
            </div>
            
        @else
                <p>No Post Found</p>
        @endif
@endsection
