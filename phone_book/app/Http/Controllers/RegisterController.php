<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RegistrationModel;

class RegisterController extends Controller
{
    public function onRegister(Request $request){
        $firstname = $request->input('firstname');
        $lastname = $request->input('lastname');
        $city = $request->input('city');
        $username = $request->input('username');
        $password = $request->input('password');
        $gender = $request->input('gender');

        $userCount = RegistrationModel::where('userName', $username)->count();

        if($userCount!= 0){
            return "User Already Exists";
        }else{
            $result = RegistrationModel::insert(['firstName'=>$firstname, 'lastName'=>$lastname, 'city'=>$city,'userName'=>$username,'password'=>$password, 'gender'=>$gender ]);
            if($result == true){
                return "Registration successfully!";
            }else{
                return "Registration failed. try again!";
            }
        }
    }
}
