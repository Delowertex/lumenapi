<?php

    namespace App\Http\Controllers;
    use Illuminate\support\Facades\DB;
    use Illuminate\Http\Request;

    class BilderController extends Controller {
        public function allowRows(){
           $result = DB::table('details')->get();
           return $result;
        }

        public function singleRow(){
            $result = DB::table('details')->where('name', 'rabbil')->get();
            return $result;
         }
         public function findRow(){
            $result = DB::table('details')->find(6);
            return $result->name;
         }

        public function pluckRow(){
            $result = DB::table('details')->pluck('class', 'name');
            return $result;
        }

        public function countRow(){
            $result = DB::table('details')->count();
            return $result;
        }
        public function maxROll(){
            // $result = DB::table('details')->min('roll');
            // $result = DB::table('details')->avg('roll');
            $result = DB::table('details')->sum('roll');
            return $result;
        }
    }
?>