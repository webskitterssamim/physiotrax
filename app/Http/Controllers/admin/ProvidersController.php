<?php

namespace App\Http\Controllers\admin;


use App\Provider;
use App\State;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use \Validator, \Redirect,\Input, \Image, \Mail;

class ProvidersController extends Controller
{
    
    public function index(Request $request)
    {
        $search = '';
        $search = trim( $request->get('search') );
        $data['search'] = $search;
		if($search){			
			$data['result']	= Provider::where('business_name','like', '%' . $search . '%')
					->orWhere('email','like','%' . $search . '%')
					->orWhere('contact_name','like','%' . $search . '%')
                    ->orWhere('phone','like','%' . $search . '%')
                    ->orWhere('address','like','%' . $search . '%')
					->orderBy('updated_at', 'desc')->paginate(10);
		}else{		
			$data['result']	= Provider::orderBy('updated_at', 'desc')->paginate(10);
		}
		
		
        
        return view('admin/providers/index',$data);
    }

    
    public function create()
    {        
       
       $data['states']= State::where('country_id','=','223')->get()->lists('state_name','id'); //Unites states
       
       return view('admin/providers/create',$data);
    }

   
    public function store(Request $request)
    {
        $validator = Validator::make(
                            $request->all(),
                            [
								  'business_name'       => 'required|unique:providers' ,                                                                                                                                               
                                  'contact_name'	    => 'required',
                                  'email'	            => 'required|email|unique:providers',
								  'password'            => 'required' , 
                                  'state'	            => 'required',
                                  'city'	            => 'required',
                                  'zip'	                => 'required',
                                  
                            ]
                            );
        if ($validator->fails())
        {
            $messages = $validator->messages();
            return Redirect::back()->withErrors($validator)->withInput();
        }
        else
        {
            $token 		 = time() . rand(999,999999);
            $newProvider = new Provider();                             
            $newProvider->password 		= $request->password;
            $newProvider->business_name = $request->business_name;
            $newProvider->contact_name	= $request->contact_name;
            $newProvider->email 		= $request->email;
            $newProvider->phone 		= $request->phone;
            $newProvider->status 		= 'Inactive';
            $newProvider->address 		= $request->address;            
            $newProvider->state_id 		= $request->state;
            $newProvider->city 			= $request->city;
            $newProvider->zip 			= $request->zip;
			$newProvider->comments 		= $request->comments;
			$newProvider->token			= $token;
            if (Input::hasFile('logo')){
                $file               = Input::file('logo');
                $imagename          = time() . '.' . $file->getClientOriginalExtension();                
                $path               = public_path('uploads/providers_logo/' . $imagename);
                $image              = \Image::make($file->getRealPath())->save($path);            
                $newProvider->logo  = $imagename;
            }            
            $newProvider->save();
			
			Mail::send('emails.provider_activation', array( 'token' => base64_encode($token),'email'=>$newProvider->email,'password' => $request->password ), function($message) use ($request)
			{			
				$message->to($request->get('email'), $request->get('name'))->subject('Welcome to PhysioTarx');
			});
			
            return Redirect::route('adm_providers')->with('succ_msg', 'Provider has been created successfully and a confirmation sent to provider email id');
        }
    }

   
    public function show($id)
    {
        
	  $data['provider'] = Provider::find($id);	 
	  return view('admin/providers/view',$data);
    }

   
    public function edit($id)
    {
      $data['states']= State::where('country_id','=','223')->get()->lists('state_name','id'); //Unites states
	  $data['provider'] = Provider::find($id);
	  return view('admin/providers/edit',$data);
    }

    
    public function update(Request $request, $id)
    {
       $validator = Validator::make(
                            $request->all(),
                            [                                                                                                      
                                  'business_name'	    => 'required',                          
                                  'contact_name'	    => 'required',
                                  'state'	            => 'required',
                                  'city'	            => 'required',
                                  'zip'	                => 'required',
                                  
                            ]
                            );
        if ($validator->fails())
        {
            $messages = $validator->messages();
            return Redirect::back()->withErrors($validator)->withInput();
        }
        else
        {
            
            $newProvider = Provider::find($id);                 
            
			if($request->password){
            $newProvider->password = $request->password;
			}
            $newProvider->business_name = $request->business_name;
            $newProvider->contact_name = $request->contact_name;            
            $newProvider->phone = $request->phone;
            $newProvider->status = $request->status;
            $newProvider->address = $request->address;            
            $newProvider->state_id = $request->state;
            $newProvider->city = $request->city;
            $newProvider->zip = $request->zip;
			$newProvider->comments 		= $request->comments;  
            if (Input::hasFile('logo')){
                $file               = Input::file('logo');
                $imagename          = time() . '.' . $file->getClientOriginalExtension();                
                $path               = public_path('uploads/providers_logo/' . $imagename);
                $image              = \Image::make($file->getRealPath())->save($path);
				if($newProvider->logo && file_exists(public_path('uploads/providers_logo/' . $newProvider->logo))){
				unlink(public_path('uploads/providers_logo/' . $newProvider->logo));
				}
                $newProvider->logo    = $imagename;
            }
            
            $newProvider->save();           
            return Redirect::route('adm_providers')->with('succ_msg', 'Provider has been updated successfully!');
        }
    }

  
    public function destroy($id)
    {
         Provider::where('id', $id)->delete();
	    return Redirect::route('adm_providers')->with('succ_msg', 'You have successfully deleted');
    }
}
