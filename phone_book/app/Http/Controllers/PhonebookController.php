<?php

namespace App\Http\Controllers;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use App\Models\PhoneBookModel;

class PhonebookController extends Controller
{
    public function onInsert(Request $request){

        $token = $request->input('access_token');
        $key = env('TOKEN_KEY');
        $decoded = JWT::decode($token, $key, array('HS256'));
        $decoded_array = (array)$decoded;
        $user = $decoded_array['user'];


        $one = $request->input('one');
        $two = $request->input('two');
        $name = $request->input('name');
        $email = $request->input('email');
        // $decoded_array = (array)$decoded;
        // return $decoded_array['user'];
        $result = PhoneBookModel::insert(['userName'=>$user, 'phone_number_one'=>$one, 'phone_number_two'=>$two,'name'=>$name,'email'=>$email]);
        if($result == true){
            return "Save Success!";
        }else{
            return "Fail ! Try again.";
        }
    }

    public function onSelect(Request $request){
        $token = $request->input('access_token');
        $key = env('TOKEN_KEY');
        $decoded = JWT::decode($token, $key, array('HS256'));
        $decoded_array = (array)$decoded;
        $user = $decoded_array['user'];

        $result = PhoneBookModel::where('userName', $user)->get();
        return $result;
    }

    public function onDelete(Request $request){
        $email = $request->input('email');
        $token = $request->input('access_token');
        $key = env('TOKEN_KEY');
        $decoded = JWT::decode($token, $key, array('HS256'));
        $decoded_array = (array)$decoded;
        $user = $decoded_array['user'];

        $result = PhoneBookModel::where(['userName'=>$user, 'email'=>$email])->delete();
        if($result==true){
            return "Delete success!";
        }else{
            return "Delete failed! Try again.";
        }
    }
}
