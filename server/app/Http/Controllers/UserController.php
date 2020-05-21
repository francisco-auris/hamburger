<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Exception;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    private $rules = [
        'name' => 'required',
        'email' => 'required|unique:users|email',
        'password' => 'required'
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::all();
        return response()->json($users);
    }

    public function userAddress( $id ){
        if( $id ){
            $user = User::find( $id );
            if( $user ){
                return $user->address;
            }
            else {
                return response()->json(
                    ['status'=>'empty', 'message'=>'user not find'], 404
                );
            }
        }
        else {
            return response()->json(
                ['status'=>'empty', 'message'=>'id user empty'], 401
            );
        }
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
        $validate = Validator::make( $request->all(), $this->rules );
        if( $validate->fails() ){
            return response()->json(
                ['status'=>'error', 'message'=>$validate->errors()], 500
            );
        }
        else {
            try {
                $user = new User();
                $user->name = $request->input('name');
                $user->email = $request->input('email');
                $user->password = bcrypt($request->input('password'));
                $user->save();
                return response()->json(
                    ['status'=>'success', 'message'=>'User created success'], 200
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
