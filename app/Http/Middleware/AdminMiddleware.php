<?php

namespace App\Http\Middleware;
use \Session;
use Closure;
use App\Adminuser;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        
        if(Session::has('ADMIN_ACCESS_ID')){
            $admin_id   = Session::get('ADMIN_ACCESS_ID');
            $adminList  = Adminuser::where("id","=",$admin_id)->get();
            if($adminList[0]->image != ''){
                $adminProfileImg    = \Config::get('constants.ADMIN_PROFILE_TH_IMG_PATH') . $adminList[0]->image;
            }else{
                $adminProfileImg    = \Config::get('constants.ADMIN_DEFAULT_PICTURE');
            }
            \Config::set('constants.ADMIN_PROFILE_PICTURE', $adminProfileImg);
        }else{
            return redirect('/admin/');
        }
        return $next($request);
    }
}
