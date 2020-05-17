<?php

namespace App\Modules\Admin\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\Controller;

class TestController extends Controller
{ 
    public function index(){
        print_r('hello this is test controller if you want to move /register type this');
        return view('Admin::showUsers');
    }

    public function show_data(Request $request){
       	$name = $request->get('name');
       	$type = $request->get('type');
        if(!empty($name)&& !empty($type)){
           	$insertData = [
                'name' =>$name,
                'type' =>$type,
           	 ];
       	   $test = DB::table('student')->insert($insertData);
           if($test){
         	   $res = ['success' =>1, 'msg' =>'save Data Successfully'];
           	 echo json_encode($res);
           	 exit();
           } else {
         	     $res = ['success' =>0, 'msg' =>'Failed'];
            }
       	     echo json_encode($res);
        }
   }

}