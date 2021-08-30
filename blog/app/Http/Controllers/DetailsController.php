<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailsModel;

class DetailsController extends Controller
{
    public function selectAll(){
        $result = DetailsModel::all();
        return $result;
    }

    public function selectbyid(Request $request){
        $id = $request->input('id');
        $result = DetailsModel::where('id', $id)->get();
        return $result;
    }

    public function countRow(){
        $result = DetailsModel::count();
        return $result;
    }
    public function countMin(){
        $result = DetailsModel::min('roll');
        return $result;
    }
    public function countMax(){
        $result = DetailsModel::max('roll');
        return $result;
    }
    public function countAvg(){
        $result = DetailsModel::avg('roll');
        return $result;
    }
    public function countSum(){
        $result = DetailsModel::sum('roll');
        return $result;
    }

    public function isnertRow(Request $request){
        $name = $request->name;
        $roll = $request->roll;
        $city = $request->city;
        $phone = $request->phone;
        $class = $request->class;

        $result = DetailsModel::insert(['name'=>$name, 'roll'=>$roll,'city'=>$city,'phone'=>$phone,'class'=>$class]);
        if($result == true){
            return "Data inserted successfully!";
        }else {
            return "Data inserted invalid!"; 
        }
    }

    public function deleteRow(Request $request){
        $id = $request->input('id');
        $result = DetailsModel::where('id', $id)->delete();
        if($result == true){
            return "Data Deleted successfully!";
        }else {
            return "Data delete invalid!"; 
        }
    }

    public function updateRow(Request $request){
        $id = $request->input('id');
        $name = $request->input('name');
        $roll = $request->input('roll');
        $result = DetailsModel::where('id', $id)->update(['name'=>$name, 'roll'=>$roll]);
        if($result == true){
            return "Data updated successfully!";
        }else {
            return "Data updated invalid!"; 
        }
    }

}
