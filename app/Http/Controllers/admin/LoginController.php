<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Adminuser;
use App\Http\Controllers\Controller;
use \Validator, \Redirect, \Session,\Cookie;
use Illuminate\Cookie\CookieJar;
use Illuminate\Cookie\CookieServiceProvider;
use Hash;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(CookieJar $cookieJar, Request $request)
    {
        if (Session::has('ADMIN_ACCESS_ID')){
            return redirect('admin/dashboard');
        }
        
        
        if ($request->isMethod('post')){			
                $admin_email		= $request->get('admin_email');
                $admin_password		= $request->get('admin_password');
                $checkAgentExists	= Adminuser::where("email","=",$admin_email);
                $checkAgentExists	= $checkAgentExists->get();
                
                if ($request->get('remember_login')){
                    $cookieJar->queue(Cookie::make('admin_email', $admin_email, 600));
                    $cookieJar->queue(Cookie::make('admin_password', $admin_password, 600));
                }else{
                    $cookieJar->queue(Cookie::forget('admin_email'));
                    $cookieJar->queue(Cookie::forget('admin_password'));
                }
                
                if(count($checkAgentExists) > 0){   
                    if (Hash::check($admin_password, $checkAgentExists[0]->password)){
                        Session::put('ADMIN_ACCESS_ID', $checkAgentExists[0]->id);
                        Session::put('ADMIN_ACCESS_FNAME', $checkAgentExists[0]->first_name);
                        Session::put('ADMIN_ACCESS_LNAME', $checkAgentExists[0]->last_name);
                        return redirect::route('adm_dashboard');
                    }else{
                        return redirect::route('admin')->with('errorMessage', 'Invalid password provided.');
                    }
                }else{
                        return redirect::route('admin')->with('errorMessage', 'Invalid email address or/and password provided.');
                }
        }
        
        $data	                        = array();
        $data['admin_email']            = '';
        $data['admin_password']         = '';
        
        $admin_email 			= Cookie::get('admin_email');
        $admin_password 		= Cookie::get('admin_password');
        
        if( $admin_email && $admin_password ){
            $data['admin_email'] 		= $admin_email;
            $data['admin_password'] 		= $admin_password;
        }
        
        return view('admin/login',$data);
    }

    public function logout(){
        Session::forget('ADMIN_ACCESS_ID');
        Session::forget('ADMIN_ACCESS_FNAME');
        Session::forget('ADMIN_ACCESS_LNAME');
        return redirect('admin')->with('message', 'You have logged out successfully.');
    }
    
    public function change_password(){
        return view('admin/change_password');
    }
     public function password_update(Request $request){
        $validator = Validator::make(
                            $request->all(),
                            [                                  
                                   'current_password'      => 'required',                                  
                                   'password'              => 'required|min:3|confirmed',
                                   'password_confirmation' => 'required|min:3'
                                  
                            ]
                            );
        if ($validator->fails())
        {
            $messages = $validator->messages();
           
            return Redirect::back()->withErrors($validator);
        }
        else
        {
          $admin = Adminuser::find(Session::get('ADMIN_ACCESS_ID'));          
           if (Hash::check($request->current_password, $admin->password)){
                $admin->password = $request->password;
                $admin->save();
                return redirect::route('adm_dashboard')->with('message', 'You have successfully changed password .');
           }else{
            return Redirect::back()->with('errorMessage', 'Your current password is invalid');
           }
        }
    }
}
