@extends('layouts.adminApp')

@section('content')
<div class="container">
        <ul class="nav navbar navbar-left d-flex d-inline-flex" style="width:100%">
            <li class="nav-item">
                    <h4>Wallet</h4>
            </li>

            <li class="nav-item" >
                    {{$wallets->links()}}
            </li>
        </ul>
        <hr>

    <div class="m-1">
        @if(count($wallets)>0)

        <table style="background-color:white" class="table ">
            <tr style="background-color:black">
                <th style="color:white">Jumlah Uang Masuk</th>
                <th style="color:white">Tanggal Uang Masuk</th>
            </tr>

            @foreach($wallets as $wallet)

            <tr style="background-color:white">
                <td style="color:black">Rp {{$wallet->uang}} </th>
                <td style="color:black">{{$wallet->created_at}}</th>
            </tr>
                            
            @endforeach

        </table>
            
                
        @else   
        <div class="alert alert-success" role="alert">
                <h2>Tidak ada Uang Masuk</h2>
        </div>
        @endif


           
    </div>
@endsection
