<?php

namespace App\Http\Controllers\admin;


use App\Excercise;
use App\State;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use \Validator, \Redirect,\Input, \Image, \Mail, \DB;

class ExcerciseController extends Controller
{
    
    public function index(Request $request)
    {
        $search = '';
        $search = trim($request->get('search'));
        $data['search'] = $search;
		if($search){			
			$data['result']	= Excercise::where('status','like', '%' . $search . '%')
					->orWhere('name','like','%' . $search . '%')					
                    ->orWhere('creator','like','%' . $search . '%')
                    ->orWhere('youtube_url','like','%' . $search . '%')
					->orderBy('updated_at', 'desc')
                    ->paginate(10);

		}else{		
			$data['result']	= Excercise::orderBy('updated_at', 'desc')->paginate(10);
		}
		return view('admin/excercies/index',$data);
    }

    public function create()
    {        
       
       $data['states']      = State::where('country_id','=','223')->get()->lists('state_name','id'); //Unites states       
       return view('admin/excercies/create',$data);
    }

   
    public function store(Request $request)
    {
        $validator = Validator::make(
                            $request->all(),
                            [                                  
                                'name'		  	        => 'required',                                  
                                'creator'	            => 'required',                                                                   
                                'youtube_url'	        => 'required',
                            ]
                            );
        if ($validator->fails())
        {
            $messages = $validator->messages();
            return Redirect::back()->withErrors($validator)->withInput();
        }
        else
        {
           
            $newExcercise = new Excercise();
            $newExcercise->fill($request->except('_token'));        
            $newExcercise->save();           
            return Redirect::route('adm_excercises')->with('succ_msg', 'Excercise has been created successfully!');
        }
    }

   
    public function show($id)
    {        
	  $data['excercise'] = Excercise::find($id);	  
	  return view('admin/excercies/view',$data);
    }

   
    public function edit($id)
    {
     
	  $data['excercise'] = Excercise::find($id);
	  return view('admin/excercies/edit',$data);
    }

    
    public function update(Request $request, $id)
    {
       $validator = Validator::make(
                            $request->all(),
                            [                                                                                                      
                                'name'		  	        => 'required',                                  
                                'creator'	            => 'required',                                                                   
                                'youtube_url'	        => 'required',
                            ]
                            );
        if ($validator->fails())
        {
            $messages = $validator->messages();
            return Redirect::back()->withErrors($validator)->withInput();
        }
        else
        {
            
            $newExcercise = Excercise::find($id);                 
            
			$newExcercise->fill($request->except('_token')); 	
			
            
            $newExcercise->save();           
            return Redirect::route('adm_excercises')->with('succ_msg', 'Clinic has been updated successfully!');
        }
    }

  
    public function destroy($id)
    {
         Excercise::where('id', $id)->delete();
	    return Redirect::route('adm_excercises')->with('succ_msg', 'You have successfully deleted');
    }
}
