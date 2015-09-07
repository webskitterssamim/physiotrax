<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Provider;
use App\Clinician;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use \Redirect, \Session;
class VerificationController extends Controller
{
    public function provider($token){
       
        $result = Provider::where('token','=', base64_decode($token))->get();
        if($result->count()){
            $provider = Provider::find( $result[0]->id);
            $provider->token = '';
            $provider->status = 'Active';
            $provider->save();
            return Redirect::route('verify_success')->with('succ_msg', 'Congratulation! your account has been verified  and activated.');
        }else{
            return Redirect::route('verify_failed')->with('succ_msg', 'Sorry! we cant verify you account Or already verified');
        }
        
        
        
    }
     public function clinician($token){
       
        $result = Clinician::where('token','=', base64_decode($token))->get();
        if($result->count()){
            $provider = Clinician::find( $result[0]->id);
            $provider->token = '';
            $provider->status = 'Active';
            $provider->save();
            return Redirect::route('verify_success')->with('succ_msg', 'Congratulation your account has been verified  and activated.');
        }else{
            return Redirect::route('verify_failed')->with('succ_msg', 'Sorry! we cant verify you account Or already verified');
        }
        
        
        
    }
    
    public function message_board(){
        if( Session::get('succ_msg') != '' ||  Session::get('err_msg') != ''){
            return view('message');
        }
        return Redirect::to('/');
    }
}
