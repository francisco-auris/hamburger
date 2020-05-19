<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;
use Exception;
use Illuminate\Support\Facades\Validator;

class ProdutoController extends Controller
{
    private $rules_store = [
        'title' => 'required|max:200',
        'ingredientes' => 'required|max:255',
        'image' => 'required',
        'preco' => 'required'
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Produto::all();
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
        //Produto::create( $request->all() );
        $validate = Validator::make( $request->all(), $this->rules_store );
        if( $validate->fails() ){
            return response()->json(
                ['status'=>'validate', 'message'=>$validate->errors()], 400
            );
        }
        else {
            try {
                Produto::create( $request->all() );
                return response()->json(
                    ['status'=>'success', 'message'=>'Produto created in success'], 200
                );
            }
            catch( Exception $e ){
                return response()->json(
                    ['status'=>'error', 'message'=>$e->getMessage()], 500
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
        return Produto::findOrFail( $id );
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
