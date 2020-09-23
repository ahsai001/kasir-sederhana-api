<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'status'=>1,
            'message'=>'getting order list success',
            'data'=> Order::with('order_details')->get()->toArray()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'total_harga'=>'required',
            'total_bayar'=>'required',
            'total_kembali'=>'required',
            'no_meja'=>'required',
            'id_menu' => 'required|array',
            'qty' => 'required|array',
        ]);

        DB::transaction(function () use ($request) {
            $order = Order::create($request->all() + ['id_user' => Auth::id()]);

            foreach($request->id_menu as $key => $value){
                $detail = OrderDetail::create([
                    'id_order' => $order->id,
                    'id_menu' => $value,
                    'qty' => $request->qty[$key],
                ]);
            }
        });


        return response()->json([
            'status'=>1,
            'message'=>'adding order success',
            'data'=> null
        ]);
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
