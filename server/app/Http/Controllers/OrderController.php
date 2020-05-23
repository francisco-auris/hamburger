<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Line;
use Exception;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    private $rules_store = [
        'payment' => 'required',
        'total' => 'required',
        'address_id' => 'required|integer',
        'user_id' => 'required|integer'
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Order::with('line')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validate = Validator::make($request->all(), $this->rules_store);
        if( $validate->fails() ){
            return response()->json(
                ['status'=>'validate', 'message'=>$validate->errors()], 400
            );
        }
        else {
            $linhas = $request->input('line');
            //vef exist products in order
            if( count($linhas) > 0 ){

                //return $linhas[0]['quantity'];

                try
                {

                    $order = new Order();
                    $order->payment = $request->input('payment');
                    $order->troco = 0;
                    $order->total = $request->input('total');
                    $order->address_id = $request->input('address_id');
                    $order->user_id = $request->input('user_id');
                    $order->save();
                    for( $i=0; $i < count($linhas); $i++ ){
                        $line = new Line();
                        $line->quantity = $linhas[$i]['quantity'];
                        $line->name = $linhas[$i]['name'];
                        $line->valor = $linhas[$i]['valor'];
                        $order->line()->save($line);
                    }

                    return response()->json(
                        ['status'=>'success', 'message'=>'Pedido reaslizado', 'id'=>$order->id], 200
                    );

                }
                catch( Exception $e ){
                    return response()->json(
                        ['status'=>'error', 'message'=>$e->getMessage()], 500
                    );
                }

            }
            else {
                return response()->json(
                    ['status'=>'empty', 'message'=>'Nenhum produto encontrado neste pedido'], 400
                );
            }
        }
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
