<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\post;
use App\transaction;
use App\User;
use App\order;
use DB;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id=auth()->user()->id;
        $products=DB::table('transaction')->join('posts','transaction.id_produk','=','posts.id')->select('transaction.id','id_produk','jumlah','name','description','price','weight','cover_image','transaction.created_at')->where('id_user','=',$user_id)->where('status','=','0')->orderBy('created_at','asc')->paginate(3);
        return view('order.checkout')->with('products',$products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $user_id=auth()->user()->id;

        $this->validate($request,[
            'kode_pos'=>'required',
            'alamat'=>'required',
        ]);

        $order=new order;
        $order->kode_pos=$request->input('kode_pos');
        $order->alamat=$request->input('alamat');
        $order->order_code=$request->input('order_code');
        $order->status=$request->input('status');
        $order->total=$request->input('total');
        $order->unique_number=$request->input('unique_number');
        $order->id_user=$user_id;
        $order->save();

        $temp=unserialize($request->input('transaction_id'));
        for($i=0;$i<sizeof($temp);$i++){
            DB::table('transaction')->where('id',$temp[$i])->update(['status'=>-1]);
        }


        return redirect('/')->with('success','Pesanan Berhasil, mohon segera lunasi pembayaran');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
