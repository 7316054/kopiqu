@extends('layouts.app')

@section('content')
    <h1>Checkout </h1>
    <hr>
    {!! Form::open(['action'=>'OrderController@store','method'=>'POST','enctype'=>'multipart/form-data']) !!}

        <div class="form-group">
            {{form::label('alamat','Alamat Pengiriman')}}
            {{form::text('alamat','',['class'=>'form-control','placeholder'=>'alamat'])}}
        </div>


        @php
           $unique_number=rand(100,200);
           $temp=0;  
           $fee=0;       
           $orderCode="";
           $transaction_id=array();
        @endphp

        <div class="form-group">
            {{form::label('kode_pos','Kode Pos')}}
            {{form::text('kode_pos','',['class'=>'form-control','maxLength'=>'5','placeholder'=>'kode pos','style'=>'width:8em;'])}}
        </div>

        <div class="form-group">
            {{form::label('payment_method','Payment Method : ')}}
            {{Form::select('payment_method', array('bank_transfer' => 'Bank Transfer'),['class'=>'form-control'])}}
        </div>
        
        <table style="background-color:white" class="table ">
            <tr style="background-color:green">
                <th style="color:white">Product</th>
                <th style="color:white">Jumlah</th>
            </tr>

        @if(count($products)>0)
            @foreach($products as $product)

                <tr>
                    <td>{{$product->name}}</td>
                    <td>{{$product->jumlah}}</td>
                </tr>
                            @php
                                $temp=$temp+$product->price*$product->jumlah;
                                $fee=$fee+$product->jumlah*$product->weight*5000;
                                $orderCode=$orderCode . $product->id_produk."/".$product->jumlah."/";
                                array_push($transaction_id,$product->id);
                            @endphp
            @endforeach
        </table>
        @endif
        <br>
        <h2>Total Harga : Rp {{$temp+$fee-$unique_number}} </h2>
        <small style="color:red">potongan : Rp {{$unique_number}} </small>
        <br>
        <br>

        {{Form::hidden('order_code',$orderCode)}}
            {{Form::hidden('total',$temp+$fee)}}
            {{Form::hidden('unique_number',$unique_number)}}
            {{Form::hidden('status',0)}}
        @php
            $result=serialize($transaction_id);
        @endphp

            {{Form::hidden('transaction_id',$result)}}
            {{form::submit('Order',['class'=>'btn btn-primary'])}}
        {!! Form::close() !!}

  
@endsection
