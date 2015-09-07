<?php

namespace App\Http\Controllers\provider;

use Illuminate\Http\Request;
use App\Provider;
use App\State;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session,\Redirect,Input;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $provider_id  = Session::get('PROVIDER_ACCESS_ID');
        $data['provider']= Provider::find($provider_id);
        return view('provider.dashboard',$data);
    }
    
    public function profile(){
        $provider_id  = Session::get('PROVIDER_ACCESS_ID');
        $data['provider']   = Provider::find($provider_id);
        $data['states']     = State::where('country_id','=','223')->get();
        if(count($data['states'])>0 ){
            $arr =array();
            foreach($data['states'] as $index=>$row){
              $arr[ $row->id ]= $row->state_name;
            }
            $data['states'] = $arr;
        }else{
            $data['states']=array();
        }
        
        return view('provider.profile',$data);
    }
    
    public function update_profile(Request $request){
        if ($request->isMethod('post')){
            $provider = Provider::find(Session::get('PROVIDER_ACCESS_ID'));            
            $provider->business_name     = $request->get('business_name');
            $provider->contact_name      = $request->get('contact_name');
            $provider->phone             = $request->get('phone');
            $provider->address           = $request->get('address');
            $provider->city              = $request->get('city');
            $provider->state_id          = $request->get('state_id');
            $provider->zip               = $request->get('zip');
        
            if($request->get('password')!=''){
                $provider->password = $request->password ;
            }
            
            $provider->save();
            return  redirect::route('provider_viewporfile')->with('succMessage', 'Profile is updated successfully');
        }
    }
    
    public function change_provider_logo(Request $request){
        if (Input::hasFile('provider_logo')){
                $file               = Input::file('provider_logo');
                $imagename          = time() . '.' . $file->getClientOriginalExtension();
                
                $path               = public_path('uploads/providers_logo/' . $imagename);
                $image              = \Image::make($file->getRealPath())->save($path);            
                $update_arr['logo']  = $imagename;
                
                Provider::where('id','=',Session::get('PROVIDER_ACCESS_ID'))->update($update_arr);
                return redirect::route('provider_viewporfile')->with('succMessage', 'Provider business logo is updated successfully');
        }
        return redirect::route('provider_viewporfile');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
