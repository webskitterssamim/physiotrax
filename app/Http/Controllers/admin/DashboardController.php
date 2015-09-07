<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Adminuser;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use \Validator, \Redirect, \Session,\Cookie, \Input;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        
        $data       = array();
        return view('admin/dashboard',$data);
    }
    
    public function account_settings(Request $request){
        $admin_id           = Session::get('ADMIN_ACCESS_ID');
        $data               = array();
        $settings	    = Adminuser::find($admin_id);
        
        if ($request->isMethod('post')){
            $validator = Validator::make(
                        $request->all(),
                        [
                            'first_name'	=> 'required',                          
                            'last_name'	        => 'required',                          
                            'email'	        => 'required'
                        ]
            );
            if($validator->fails()){
                return redirect::route('account_settings')->withErrors($validator);
            }else{
                $first_name                  = $request->first_name;
                $last_name                   = $request->last_name;
                $email                       = $request->email;
                $phone                       = $request->phone;

                $settings->first_name        = $first_name;
                $settings->last_name         = $last_name;
                $settings->email             = $email;
                $settings->phone             = $phone;
                
                if (Input::hasFile('image')){
                    if(\File::exists('upload/adminprofile/' . $settings->image)){
                        \File::delete('upload/adminprofile/' . $settings->image);
                    }
                    if(\File::exists('upload/adminprofile/thumb/' . $settings->image)){
                        \File::delete('upload/adminprofile/thumb/' . $settings->image);
                    }
                    
                    $file               = Input::file('image');
                    $imagename          = $admin_id . '.' . $file->getClientOriginalExtension();
                    $path               = public_path('upload/adminprofile/' . $imagename);
                    $image              = \Image::make($file->getRealPath())->save($path);
                    $th_path            = public_path('upload/adminprofile/thumb/' . $imagename);
                    $image              = \Image::make($file->getRealPath())->resize(128, 128)->save($th_path);
                    $settings->image    = $imagename;
                }
                
                $settings->save();
                return redirect::route('account_settings')->with('success', 'Settings updated successfully.');
            }
        }
        
           
        $data['settings']   = $settings;
        return view('admin/account_settings',$data);
    }
    
    public function change_password(Request $request){
        $admin_id           = Session::get('ADMIN_ACCESS_ID');
        $data               = array();
        $settings	    = Adminuser::find($admin_id);
        
        
        if ($request->isMethod('post')){
            $validator = Validator::make(
                        $request->all(),
                        [
                            'current_password'	        => 'required',                          
                            'new_password'	        => 'required|confirmed',                          
                            'new_password_confirmation'	=> 'required'
                        ]
            );
            
            if($validator->fails()){
                return redirect::route('change_password')->withErrors($validator);
            }else{
                $current_password                   = $request->current_password;
                $new_password                       = $request->new_password;
                $new_password_confirmation          = $request->new_password_confirmation;

                if (\Hash::check($current_password, $settings->password)){
                    $settings->password     = $new_password;
                    $settings->save();
                    return redirect::route('change_password')->with('success', 'Password updated successfully.');
                }else{
                    return redirect::route('change_password')->with('error', 'Invalid current password provided.');
                }
            }
        }
        
        return view('admin/change_password',$data);
    }
   
}
