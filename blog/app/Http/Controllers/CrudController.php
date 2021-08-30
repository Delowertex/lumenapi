<?php

namespace App\Http\Controllers;
use Illuminate\support\Facades\DB;
use Illuminate\Http\Request;

class CrudController extends Controller {

    public function detailSelect(Request $request){
        $sql = "SELECT * FROM details"; 
        $request = DB::select($sql);
        return $request;
    }

    public function store(Request $request){
        $name = $request->input('name');
        $roll = $request->input('roll');
        $city = $request->input('city');
        $phone = $request->input('phone');
        $class = $request->input('class');

        $sql = "INSERT INTO `details`(`name`, `roll`, `city`, `phone`, `class`) VALUES (?,?,?,?,?)";

        $inset = DB::insert($sql, [$name, $roll, $city,  $phone, $class]);
        if($inset==true){
            return "Data inserted successfully!";
        }else {
            return "Data save fail. Try again!";
        }
    }

    public function detailDelete(Request $request){
        $id = $request->input('id');
        return $id;
    }

    public function insertData(Request $request){
        $name = $request->input('name');
        $roll = $request->input('roll');
        $city = $request->input('city');
        $phone = $request->input('phone');
        $class = $request->input('class');

        $result = DB::table('details')->insert(['name'=>$name, 'roll'=>$roll, 'city'=>$city, 'phone'=>$phone, 'class'=>$class]);
        if($result == true){
            return "Data inserted successfully!";
        }else {
            return "Data not inserted";
        }
    }

    public function updateData(Request $request){
        $name = $request->input('name');
        $id = $request->input('id');
        $result = DB::table('details')->where('id', $id)->update(['name'=>$name]);
        if($result == true){
            return "Data updated successfully!";
        }else {
            return "Data not updated";
        }
    }

    public function deleteData(Request $request){
        $id = $request->input('id');
        $result = DB::table('details')->where('id', $id)->delete();
        if($result == true){
            return "Data deleted successfully!";
        }else {
            return "Data not deleted";
        }
    }

    public function createData(){
        
    }
}

?>