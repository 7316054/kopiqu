@extends('layouts.app')

@section('content')
    <div class="container">
        <ul class="nav navbar navbar-left d-flex d-inline-flex" style="width:100%">
            <li class="nav-item">
                    <h4>Cart <i class="fa fa-shopping-cart"></i></h4>
            </li>
        </ul>
                 
    </div>
    @php
           $temp=0;  
           $fee=0;                   
    @endphp
  
        <hr>
        @if(count($products)>0)
            @foreach($products as $product)
                <div class="card card-body bg-light m-2 ">
                        <div class="row">

                             
                           <img class="ml-3"style="width:10em" src="/storage/cover_image/{{$product->cover_image}}">
                             
        
                            <div class="col-md-5 col-sm-5 ml-3" >
                                    <h4><a style="color:black">{{$product->name}}</a></h4>
                                    <p>{{$product->description}}</p>
                                    <p>Jumlah : {{$product->jumlah}} pcs</p>
                                    <p>Berat : {{$product->weight}} Kg</p>
                                    <p>Price  : {{$product->price}} / pcs</p>
                            </div>

                            
                            <div class="col-md-3 col-sm-3 ml-3" >
                            <h4 style="width:10em;color:green">Total Price :Rp {{$product->price*$product->jumlah}}</h4>

                            @php
                                $temp=$temp+$product->price*$product->jumlah;
                                $fee=$fee+$product->jumlah*$product->weight*5000;
                            @endphp

                                  
                            </div>


                            <div class="col-md-1 col-sm-1 ml-3" >
                                    {!! Form::open(['action'=>['TransactionController@destroy',$product->id],'method'=>'POST','class'=>'float-right'])!!}
                                    {{Form::hidden('_method','DELETE')}}
                                    {{Form::submit('Remove',['class'=>'btn btn-danger'])}}
                                    {!! Form::close()!!}
                            </div>

                           
                        </div>
                       
                </div>
            @endforeach
            <br><br>
            <div class="card card-body bg-light m-2 ">
                    <div class="row m-2">
                            <div class="col-md-2 " >
                                    <p style="color:black">All Product</p>
                            </div>
                            <div class="col-md-2 " >
                                 <p style="color:black">: Rp {{$temp}}</p>
                            </div>
                            
                    </div>

                    <div class="row m-2">
                            <div class="col-md-2 col-sm-2 " >
                                    <p style="color:black">Shipping Fee</p>
                            </div>
                            <div class="col-md-2 col-sm-2 " >
                                 <p style="color:black">: Rp {{$fee}}</p>
                            </div>
                    </div>

                    <div class="row m-2">
                            <div class="col-md-2 col-sm-2" >
                                    <p style="color:red">Grand Total</p>
                            </div>
                            <div class="col-md-5 col-sm-5" >
                                 <p style="color:red">: Rp {{$fee+$temp}}</p>
                            </div>
                            <div class="col-md-5 col-sm-5 " >
                                 <a class=" btn-success p-3 float-right" style="color:white" href="/order">checkout </a>
                           </div> 
                    </div>
                    
            </div>

            <div class="d-flex justify-content-center">
                    {{$products->links()}}
               </div>
            
        @else
        
        <div class="alert alert-success" role="alert">
                <h2>Empty Cart </h1>
        </div>
        @endif
@endsection
