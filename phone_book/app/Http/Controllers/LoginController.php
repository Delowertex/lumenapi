<?php

namespace App\Http\Controllers;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use App\Models\RegistrationModel;

class LoginController extends Controller
{

    public function onLogin(Request $request){
        
        $userName = $request->input('userName');
        $password = $request->input('password');
        $userCount = RegistrationModel::where(['userName'=>$userName, 'password'=>$password])->count();

        if($userCount == 1){
            $key = env('TOKEN_KEY');
            $payload = array(
                "site" => "http://coderdelower.com",
                "user" => $userName,
                "iat" => time(),
                "exp" => time()+36000
            );
            $jwt = JWT::encode($payload, $key);
            return response()->json(['Token'=>$jwt, 'status'=>'Login Success!']);
        }
        else {

        }
        return "Worng userName or passWord";
    }
}
