<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class DataOperatorAuth {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{

        $remember_token = Session::get('remember_token');
        $admin_data = DB::table('admin')->select('user_role')->where('remember_token', $remember_token)->first();

        return redirect('admin/unauthorize-access');
	}

}
