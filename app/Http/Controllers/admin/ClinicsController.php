<?php

namespace App\Http\Controllers\admin;


use App\Clinic;
use App\State;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use \Validator, \Redirect,\Input, \Image, \Mail, \DB;

class ClinicsController extends Controller
{
    
    public function index(Request $request)
    {
        $search = '';
        $search = trim($request->get('search'));
        $data['search'] = $search;
		if($search){			
			$data['result']	= Clinic::where('name','like', '%' . $search . '%')
					->orWhere('email','like','%' . $search . '%')					
                    ->orWhere('phone','like','%' . $search . '%')
                    ->orWhere('address','like','%' . $search . '%')
					->orderBy('updated_at', 'desc')->paginate(10);
			
			 
		}else{		
			$data['result']	= Clinic::orderBy('updated_at', 'desc')->paginate(10);
		}
		return view('admin/clinics/index',$data);
    }

    
    public function create()
    {        
       
       $data['states']      = State::where('country_id','=','223')->get()->lists('state_name','id'); //Unites states       
       return view('admin/clinics/create',$data);
    }

   
    public function store(Request $request)
    {
        $validator = Validator::make(
                            $request->all(),
                            [                                  
                                  'name'		  	    => 'required',                                  
                                  'email'	            => 'required|email|unique:clinics',                                 
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
           
            $newClinic = new Clinic();                             
           
            $newClinic->name       		= $request->name;            
            $newClinic->email 		    = $request->email;
            $newClinic->phone 		    = $request->phone;
			$newClinic->contact_phone 	= $request->contact_phone;
            $newClinic->status 		    = $request->status;
            $newClinic->address 		= $request->address;            
            $newClinic->state_id 		= $request->state;
            $newClinic->city 			= $request->city;
            $newClinic->zip 			= $request->zip;			
			
            if (Input::hasFile('image')){
                $file               = Input::file('image');
                $imagename          = time() . '.' . $file->getClientOriginalExtension();                
                $path               = public_path('uploads/clinics_image/' . $imagename);
                $image              = \Image::make($file->getRealPath())->save($path);            
                $newClinic->image  = $imagename;
            }            
            $newClinic->save();
			
			//Mail::send('emails.clinician_activation', array( 'token' => base64_encode($token),'email'=>$newClinic->email,'password' => $request->password ), function($message) use ($request)
			//{			
			//	$message->to($request->get('email'), $request->get('name'))->subject('Welcome to PhysioTarx');
			//});
			
            return Redirect::route('adm_clinics')->with('succ_msg', 'Clinics has been created successfully!');
        }
    }

   
    public function show($id)
    {        
	  $data['clinic'] = Clinic::find($id);	  
	  return view('admin/clinics/view',$data);
    }

   
    public function edit($id)
    {
      $data['states']= State::where('country_id','=','223')->get()->lists('state_name','id'); //Unites states
	  
	  $data['clinic'] = Clinic::find($id);
	  return view('admin/clinics/edit',$data);
    }

    
    public function update(Request $request, $id)
    {
       $validator = Validator::make(
                            $request->all(),
                            [                                                                                                      
                                 'name'		  	    	=> 'required',                                  
                                  'email'	            => 'required|email',                                 
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
            
            $newClinic = Clinic::find($id);                 
            
			$newClinic->name       		= $request->name;            
            $newClinic->email 		    = $request->email;
            $newClinic->phone 		    = $request->phone;
			$newClinic->contact_phone 	= $request->contact_phone;
            $newClinic->status 		    = $request->status;
            $newClinic->address 		= $request->address;            
            $newClinic->state_id 		= $request->state;
            $newClinic->city 			= $request->city;
            $newClinic->zip 			= $request->zip;	
			
            
            $newClinic->save();           
            return Redirect::route('adm_clinics')->with('succ_msg', 'Clinic has been updated successfully!');
        }
    }

  
    public function destroy($id)
    {
         Clinic::where('id', $id)->delete();
	    return Redirect::route('adm_clinics')->with('succ_msg', 'You have successfully deleted');
    }
}
