<?php namespace App\Http\Controllers\admin;

use App\Sitesetting;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model as Eloquent;
use \Validator, \Redirect, \Session;
use App\Http\Helpers;

class SitesettingController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{           
	    //$records    = Sitesetting::get();
            $records    = Sitesetting::paginate(10);
            return view('admin/sitesetting/index', array("result" => $records));
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
	 * @return Response
	 */
	public function store()
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
            $data               = array();
            $data['result']     = Sitesetting::find($id);
            return view('admin/sitesetting/edit', $data);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request)
	{
	    $id                    = $request->get('id');
            $sitesettings_value    = $request->get('sitesettings_value');
            
            Sitesetting::where('id', $id)->
                                update([
                                    'sitesettings_value'   => $sitesettings_value,
                                ]);
                                
            return Redirect::to('admin/sitesettings')->with('succ_msg', 'You have successfully updated');
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
