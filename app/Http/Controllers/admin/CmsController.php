<?php namespace App\Http\Controllers\admin;

use App\Cms;
use App\Http\Requests;
use App\Http\Helpers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Validator, \Redirect, \Session;
use Intervention\Image\ImageManagerStatic as Image;

class CmsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
	    $cmslist	= Cms::where("id","<>",'')->paginate(10);
            return view('admin/cms/index', array("result" => $cmslist));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
	    //$img = Image::make('/var/www/html/foreignhub-dev/public/upload/test.jpg');
	    //$img->resize(100, 100);
	    //$img->save('/var/www/html/foreignhub-dev/public/upload/bar.jpg'); 
	    
		return view('admin/cms/create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
                $hleper = new Helpers();
		
		$validator = Validator::make(
                                      $request->all(),
                                       [
                                            'page_title'	=> 'required|unique:cms',
					    'page_content'	=> 'required',
                                       ]
                        );
		if ($validator->fails()){
			$messages = $validator->messages();			    
			 return redirect()->back()->withErrors($validator->errors())->withInput();
		}else{
	    
			$page_title		= $request->get('page_title');
			$page_content		= $request->get('page_content');
			$cms_slug	        = $hleper->url_title(strtolower($page_title));
			//$status		        = 'Inactive';
			
			$new_provider = new Cms();
			
			$new_provider->page_title           = $page_title;
			$new_provider->page_slug            = $cms_slug;
			$new_provider->page_content         = $page_content;
			//$new_provider->created_at           = date('Y-m-d H:i:s');;
		
			$new_provider->save();
			
			
		}
		

		return Redirect::to('admin/cms')->with('succ_msg', 'CMS has been created successfully!');
		exit();		
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
            $data['result']     = Cms::find($id);
            return view('admin/cms/edit', $data);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request)
	{
	        $hleper = new Helpers();
                $cms_id	= $request->get('id');
		$validator = Validator::make(
                                      $request->all(),
                                       [
                                            //'page_title'	=> 'required|unique:cms,page_title,'.$cms_id,
					    'page_content'	=> 'required',

                                       ]
                        );
		
		if ($validator->fails()){
			$messages = $validator->messages();
			return redirect()->back()->withErrors($validator->errors())->withInput();
		}else{
			
			//$updatedArr['page_title']		= $request->get('page_title');
			$updatedArr['page_content']		= $request->get('page_content');
			//$updatedArr['page_slug']		= $hleper->url_title(strtolower($request->get('page_title')));
			//$updatedArr['updated_at']               = date('Y-m-d H:i:s');;

			       
		   
		       Cms::where('id', $cms_id)->update($updatedArr);
		}
		
		return Redirect::to('admin/cms')->with('succ_msg', 'You have successfully updated');		
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
	    Cms::where('id', '=', $id)->delete();
            return Redirect::to('admin/cms')->with('succ_msg', 'You have successfully delete the record');		
	}

}
