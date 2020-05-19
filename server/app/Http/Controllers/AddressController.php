<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Address;
use App\User;
use Exception;
use Illuminate\Support\Facades\Validator;

class AddressController extends Controller
{
    private $rules_store = [
        'endereco' => 'required|max:255',
        'cep' => 'required|max:50',
        'obs' => 'required|max:200',
        'user_id' => 'required'
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Address::all();
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
        $user = User::find( $request->input('user_id') );
        if( $user ){

            $validate = Validator::make( $request->all(), $this->rules_store );
            if( $validate->fails() ){
                return response()->json(
                    ['status'=>'validate', 'message'=>$validate->errors()], 400
                );
            }
            else {
                try {

                    $a = new Address();
                    $a->endereco = $request->input('endereco');
                    $a->cep = $request->input('cep');
                    $a->obs = $request->input('obs');
                    $a->user()->associate($user);
                    $a->save();
                    return response()->json(
                        ['status'=>'success', 'message'=>'Address saved in user'], 200
                    );

                }
                catch( Exception $e ){
                    return response()->json(
                        ['status'=>'error', 'message'=>$e->getMessage()], 500
                    );
                }
            }

        }
        else {
            return response()->json(
                ['status'=>'empty', 'message'=>'User not find ref'], 404
            );
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
