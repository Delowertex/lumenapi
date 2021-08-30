<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MyController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function My($name){
        // return "My Name is $name";
        // return response($name);
        // return response($name)->header('name', $name);
        return response($name)
                ->header('name', $name)
                ->header('age', '28')
                ->header('city', 'dhaka')
                ->header('username', 'delower');
    }
    public function MyJson(){
        // $myArray = array('volvo', 'totyota', 'porshe');
        // $myArray =  array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");
        $myArray = array (
            array("Volvo",22,18),
            array("BMW",15,13),
            array("Saab",5,2),
            array("Land Rover",17,15)
          );
        return response($myArray);
    }

    public function First(){
        // return "I am First";
        return redirect('/second');
    }
    public function Second(){
        return "I am redirect from first";
    }

    public function download(){
        $path = 'demo.txt';
        return response()->download($path);
    }

    public function catch(Request $request){
        // return $request->header('name');
    }

    public function detailSelect(Request $request){
        // $sql = "SELECT * FROM details";
        // $request = DB::select($sql);
        return $request->header();
    }

    // public function detailCreate(Request $request){
    //     $name = $request->input("name");
    //     $roll = $request->input("roll");
    //     $city = $request->input("city");
    //     $phone = $request->input("phone");
    //     $class = $request->input("class");
    //     return $name;
    // }
}