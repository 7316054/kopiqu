@extends('layouts.app')

@section('content')
<div class="container">
        <ul class="nav navbar navbar-left d-flex d-inline-flex" style="width:100%">
            <li class="nav-item">
                    <h4>OrderList</h4>
            </li>

            <li class="nav-item" >
                    {{$orders->links()}}
            </li>
        </ul>

    <div class="m-1">
        @if(count($orders)>0)
            @foreach($orders as $order)

                <div class="card card-body bg-light m-3 ">
                    <div class="row">
                            <div class="col-md-6 col-sm-6" >
                                    <p class="card-text">Nomor Order : {{$order->id.$order->order_code}}</p>

                                  

                            </div>

                            <div class="col-md-6 col-sm-6" >
                                    @if ($order->status==0)
                                        <div style="width:10em;background-color:red;color:white;text-align:center" class="container float-right">Pending</div>
                                    @endif
                                    @if ($order->status==1)
                                        <div style="width:10em;background-color:orange;color:white;text-align:center" class="container float-right">Paid</div>
                                     @endif
                                    @if ($order->status==2)
                                         <div style="width:10em;background-color:green;color:white;text-align:center" class="container float-right">Shipped</div>
                                    @endif
                                    

                            </div>


                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6 col-sm-6" >
                                        <small class="card-text">Alamat Penerima : {{$order->alamat}}</small>
                              </div>  
                         </div>
                         <div class="row">
                                <div class="col-md-6 col-sm-6" >
                                     <small class="card-text">Kode Pos : {{$order->kode_pos}} </small>
                                  </div>  
                             </div>

                             <div class="row">
                                    <div class="col-md-6 col-sm-6" >
                                         <small class="card-text"> Detail Pesanan </small>
                                         <hr>
                                      </div>  
                            </div>

                            <table style="background-color:white" class="table ">
                                    <tr style="background-color:black">
                                        <th style="color:white">Product</th>
                                        <th style="color:white">Jumlah</th>
                                    </tr>
                            @php
                                $temp=$order->order_code;
                                $result=(explode("/",$temp));
                                $j=1;
                               
                            @endphp
                                @for ($i=0;$i<sizeof($result)-1;$i+=2,$j+=2)
                                @php $nama=DB::table('posts')->select('name')->where('id','=',$result[$i])->value('name') @endphp
                                <tr style="background-color:white">
                                        <td style="color:black">{{$nama}} </th>
                                        <td style="color:black">{{$result[$j]}}</th>
                                 </tr>
                            @endfor

                            </table>
                                    <div class="container" style="background-color:white" >
                                         <p>Total Pembayaran : Rp {{$order->total}}</p>
                                   </div>  
                            </div>
            @endforeach

            
                
        @else   
        <div class="alert alert-success" role="alert">
                <p>Tidak Ada Order</p>
        </div>
        @endif


           
    </div>
@endsection
