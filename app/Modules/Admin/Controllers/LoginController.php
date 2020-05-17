<?php

namespace App\Modules\Admin\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth; 
use App\Http\Controllers\Controller;
use Validator,Session,Redirect,Response,Config;
use Helper,Mail,URL;

class LoginController extends Controller
{
    // this function for used load page

    public function index(){
        return view('Admin::login_form.register');
    }
    // here this function is used for register users

    public function insert_data(Request $request){
         $validator = Validator::make($request->all(), [
         'name' => 'required',
         'email' => 'required|unique:register,email',
         'contact' => 'required',
         'password' => 'required',
         ]);
         if ($validator->fails()) {
              return redirect('register')->withErrors($validator)->withInput();
           }
           else {
               $name = $request->get('name');
               $email = $request->get('email');
               $contact = $request->get('contact');
               $password = $request->get('password');
               $insertData = [
                  'name' => $name,
                  'email' => $email,
                  'gender' => '',
                  'contact' => $contact,
                  'profile' => '',
                  'password' => $password
                ];
                $test = DB::table('register')->insert($insertData);
                if($test){
                    return redirect('register')->with("status", "Your data is inserted Successfully,");
                 } 
                else {
                  return back()->with("status2", "Sorry Your data is not inserted Successfully!!,");
                }
          }
     }
  // here function for load page for login 

   public function login(){
        return view('Admin::login_form.login');
  }
  // here function for load page for home 

  public function dashboard_page(){
       $data['getuserdetail'] = DB::table('register')->get();
       return view('Admin::login_form.dashboard',$data);
  }
  // here function for check login page 

  public function login_data(Request $request){ 
          $validator = Validator::make($request->all(), [
          'email' => 'required|email',
          'password' => 'required',
          ]);
          if ($validator->fails()) {
              return redirect('login')->withErrors($validator)->withInput();
          }
          else {
               $email = $request->get('email');
               $password = $request->get('password');
               $result = DB::SELECT("SELECT name, email, id, password FROM register WHERE email='".$email."' AND password ='".$password."'");
          
              if(!empty($result)){
                $request->session()->put('email', $result[0]->email);
                $request->session()->put('name', $result[0]->name);
                $request->session()->put('id', $result[0]->id);
                 return redirect('dashboard-page')->with("status","succesfully login");
              }
              else{
                  return redirect('login')->with("status2", "Username/Password is invalid!!,");
              }
         }
   }
   // here function for edit user details

   public function edit_user(Request $request, $id = null){
       $data['get_user_detail'] = DB::table('register')->where('id',$id)->get();
       return view('Admin::login_form.edit_page',$data);
  }
   // here function for update users details

   public function update_data(Request $request){
             $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'contact' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('register')->withErrors($validator)->withInput();
        }
        else {
               $id = $request->get('user_id');
               $name = $request->get('name');
               $email = $request->get('email');
               $contact = $request->get('contact');
               $password = $request->get('password');
               $updateData = [
              'name' =>$name,
              'email' =>$email,
              'gender' =>'',
              'contact' =>$contact,
              'profile' =>'',
              'password' =>$password
               ]; 
             $test = DB::table('register')->where('id',$id)->update($updateData);
            
             if($test){
                 return redirect('dashboard-page')->with("status", "Updated Data successfully!!,");
             }
             else {
               return redirect('dashboard-page')->with("status2", "Failed,");
             }
        }
  }
  // here function for logout users

  public function logout_user(Request $request){      
        Auth::logout();
        Session()->flush();
        return redirect('login');
  }

}