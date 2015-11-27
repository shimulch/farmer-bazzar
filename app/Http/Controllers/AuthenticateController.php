<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

use Illuminate\Http\Request;

class AuthenticateController extends Controller {



    public function __construct()
    {
       $this->middleware('jwt.auth', ['except' => ['authenticate', 'register']]);
    }
    
	
    public function register(Request $request){
        $v = [
            'name' => 'required',
            'phone_no' => 'required|unique:users',
            'house' => 'required',
            'village' => 'required',
            'post_office' => 'required',
            'post_code' => 'required|numeric',
            'thana' => 'required',
            'district' => 'required',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'
        ];

        $data = [
            'name' => $request->name,
            'phone_no' => $request->phone_no,
            'house' => $request->house,
            'village' => $request->village,
            'post_office' => $request->post_office,
            'post_code' => $request->post_code,
            'thana' => $request->thana,
            'district' => $request->district,
            'password' => $request->password,
            'password_confirmation' => $request->confirm_password
        ];



        $valid = \Validator::make($data, $v);

        if($valid->fails()) return response()->json(['errors' => $valid->errors()->all()], 400);
        else return response()->json(['success' => 'success'], 200);

    }


	public function authenticate(Request $request)
    {
        $credentials = $request->only('phone_no', 'password');
        try {
            // verify the credentials and create a token for the user
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        // if no errors are encountered we can return a JWT
        return response()->json(compact('token'));
    }

}
