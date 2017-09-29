<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;

class UserController extends Controller
{
    /**
     * [__construct description]
     */
    public function __construct()
    {
        $this->middleware('auth:api')->only('logout');
    }

    /**
     * [register description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function register(Request $request)
    {
		$this->validate($request, [
		    'name'     => 'required',
		    'email'    => 'required|unique:users',
		    'password' => 'required|confirmed'
		]);

		$user           = new User($request->all());
		$user->password = bcrypt($request->password);
		$user->save();

		return response()->json([
		    'registered' => true
		]);

    }

    /**
     * [login description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function login(Request $request)
    {

    	$this->validate($request,[
			'email'    => 'required|email',
			'password' => 'required'
    	]);

    	$user = User::where('email', $request->email)->first();

    	if($user && Hash::check($request->password, $user->password)){

    		$user->api_token = str_random(60);
            $user->save();

            return response()->json([
				'authenticated' => true,
				'api_token'     => $user->api_token,
				'user_id'       => $user->id
            ]);

    	}

		return response()->json([
		    'email' => ['Provided email and password does not match!']
		], 422);
    }

    /**
     * [logout description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function logout(Request $request)
    {
        $user            = $request->user();
        $user->api_token = null;
        $user->save();

        return response()->json([
            'done' => true
        ]);
    }
}
