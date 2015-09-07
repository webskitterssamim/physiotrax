<?php

namespace App\Http\Controllers\admin;


use App\Clinician;
use App\State;
use App\Provider;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use \Validator, \Redirect,\Input, \Image, \Mail, \DB;

class CliniciansController extends Controller
{
    
    public function index(Request $request)
    {
        $search = '';
        $search = trim( $request->get('search') );
        $data['search'] = $search;
		if($search){			
//			$data['result']	= Clinician::with(['provider'=>function($q) use ($search){ 
//					$q->where('business_name','like', '%' . $search . '%');
//				}])
//					->where('business_name','like', '%' . $search . '%')
//					->where('first_name','like', '%' . $search . '%')
//					->orWhere('email','like','%' . $search . '%')
//					->orWhere(DB::raw('CONCAT( `first_name` , " ", `last_name` )'),'like','%' . $search . '%')
//                    ->orWhere('phone','like','%' . $search . '%')
//                    ->orWhere('address','like','%' . $search . '%')
//					->orderBy('updated_at', 'desc')->paginate(10);
			
			$data['result'] = DB::table('clinicians')
            ->join('providers', 'clinicians.provider_id', '=', 'providers.id')          
            ->select('clinicians.*', 'providers.business_name')
			->where('providers.business_name','like', '%' . $search . '%')			
			->orWhere('clinicians.email','like','%' . $search . '%')
			->orWhere(DB::raw('CONCAT( first_name , " ", last_name )'),'like','%' . $search . '%')
			->orWhere('clinicians.phone','like','%' . $search . '%')
			->orWhere('clinicians.address','like','%' . $search . '%')
            ->orderBy('clinicians.updated_at', 'desc')
			->paginate(10);
			 
		}else{		
			$data['result'] = DB::table('clinicians')
            ->join('providers', 'clinicians.provider_id', '=', 'providers.id')          
            ->select('clinicians.*', 'providers.business_name')
			->orderBy('clinicians.updated_at', 'desc')
			->paginate(10);
		}
		
		
        
        return view('admin/clinicians/index',$data);
    }

    
    public function create()
    {        
       
       $data['states']      = State::where('country_id','=','223')->get()->lists('state_name','id'); //Unites states
       $data['providers']   = Provider::all()->lists('business_name','id');
       
       return view('admin/clinicians/create',$data);
    }

   
    public function store(Request $request)
    {
        $validator = Validator::make(
                            $request->all(),
                            [                                  
                                  'password'            => 'required|unique:clinicians' ,                                                                                          
                                  'first_name'  	    => 'required',
                                  'last_name'     	    => 'required',
                                  'email'	            => 'required|email|unique:clinicians',                                 
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
            $newClinician = new Clinician();                             
            $newClinician->password 		= $request->password;
            $newClinician->provider_id 		= $request->provider;
            $newClinician->first_name       = $request->first_name;
            $newClinician->last_name	    = $request->last_name;
            $newClinician->email 		    = $request->email;
            $newClinician->phone 		    = $request->phone;
            $newClinician->status 		    = 'Inactive';
            $newClinician->address 		    = $request->address;            
            $newClinician->state_id 		= $request->state;
            $newClinician->city 			= $request->city;
            $newClinician->zip 			    = $request->zip;			
			$newClinician->token			= $token;
            if (Input::hasFile('image')){
                $file               = Input::file('image');
                $imagename          = time() . '.' . $file->getClientOriginalExtension();                
                $path               = public_path('uploads/clinicians_image/' . $imagename);
                $image              = \Image::make($file->getRealPath())->save($path);            
                $newClinician->image  = $imagename;
            }            
            $newClinician->save();
			
			Mail::send('emails.clinician_activation', array( 'token' => base64_encode($token),'email'=>$newClinician->email,'password' => $request->password ), function($message) use ($request)
			{			
				$message->to($request->get('email'), $request->get('name'))->subject('Welcome to PhysioTarx');
			});
			
            return Redirect::route('adm_clinicians')->with('succ_msg', 'Clinician has been created successfully and a confirmation email sent to clinician email id');
        }
    }

   
    public function show($id)
    {        
	  $data['clinician'] = Clinician::find($id);	  
	  return view('admin/clinicians/view',$data);
    }

   
    public function edit($id)
    {
      $data['states']= State::where('country_id','=','223')->get()->lists('state_name','id'); //Unites states
	  $data['providers']= Provider::all()->lists('business_name','id'); 
	  $data['clinician'] = Clinician::find($id);
	  return view('admin/clinicians/edit',$data);
    }

    
    public function update(Request $request, $id)
    {
       $validator = Validator::make(
                            $request->all(),
                            [                                                                                                      
                                 'first_name'  	    => 'required',
                                  'last_name'     	    => 'required',                                                            
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
            
            $newClinician = Clinician::find($id);                 
            
			if($request->password){
            $newClinician->password = $request->password;
			}
            $newClinician->first_name 		= $request->first_name;
			$newClinician->last_name 		= $request->last_name;
            $newClinician->provider_id 		= $request->provider;                    
            $newClinician->phone 			= $request->phone;
            $newClinician->status 			= $request->status;
            $newClinician->address 			= $request->address;            
            $newClinician->state_id 		= $request->state;
            $newClinician->city 			= $request->city;
            $newClinician->zip 				= $request->zip;
			
            if (Input::hasFile('image')){
                $file               = Input::file('image');
                $imagename          = time() . '.' . $file->getClientOriginalExtension();                
                $path               = public_path('uploads/clinicians_image/' . $imagename);
                $image              = \Image::make($file->getRealPath())->save($path);
				if($newClinician->logo && file_exists(public_path('uploads/clinicians_logo/' . $newClinician->image))){
				unlink(public_path('uploads/clinicians_logo/' . $newClinician->image));
				}
                $newClinician->image    = $imagename;
            }
            
            $newClinician->save();           
            return Redirect::route('adm_clinicians')->with('succ_msg', 'Clinician has been updated successfully!');
        }
    }

  
    public function destroy($id)
    {
         Clinician::where('id', $id)->delete();
	    return Redirect::route('adm_clinicians')->with('succ_msg', 'You have successfully deleted');
    }
}
