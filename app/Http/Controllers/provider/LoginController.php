<?php

namespace App\Http\Controllers\provider;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Provider;
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
    
    public function logout(){
        Session::forget('PROVIDER_ACCESS_ID');
        Session::forget('PROVIDER_ACCESS_BUSINESS_NAME');
        Session::forget('PROVIDER_ACCESS_CONTACTNAME');
        return redirect::to('/');
    }
    
    public function loginAction(CookieJar $cookieJar, Request $request)
    {
       
        $response['code']=0;
        $response['msg']='';
                
        if ($request->isMethod('post')){			
                $provider_email		= $request->get('email');
                $provider_password		= $request->get('password');
                $checkAgentExists	= Provider::where("email","=",$provider_email);
                $checkAgentExists	= $checkAgentExists->get();
                
                if ($request->get('remember_login')){
                    $cookieJar->queue(Cookie::make('provider_email', $provider_email, 600));
                    $cookieJar->queue(Cookie::make('provider_password', $provider_password, 600));
                }else{
                    $cookieJar->queue(Cookie::forget('provider_email'));
                    $cookieJar->queue(Cookie::forget('provider_password'));
                }
                if(count($checkAgentExists) > 0){   
                    if (Hash::check($provider_password, $checkAgentExists[0]->password)){
                        Session::put('PROVIDER_ACCESS_ID', $checkAgentExists[0]->id);
                        Session::put('PROVIDER_ACCESS_BUSINESS_NAME', $checkAgentExists[0]->business_name);
                        Session::put('PROVIDER_ACCESS_CONTACTNAME', $checkAgentExists[0]->contact_name);
                        $response['code']=1;
                        $response['msg']='Login successful';
                    }else{
                        $response['code']=0;
                        $response['msg']='Invalid password provided.';
                        
                    }
                }else{
                        $response['code']=0;
                        $response['msg']='Invalid email address or/and password provided.';
                        
                }
                
        }
        echo json_encode($response);
        
    }

}
