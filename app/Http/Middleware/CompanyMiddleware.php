<?php

namespace App\Http\Middleware;

use App\Models\Company;
use App\Models\Creator;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Closure;

class CompanyMiddleware
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
        $company = $request->route()->parameter('id');

             $response = $next($request);


             if(auth()->check()) {

                $company_id = auth()->user()->company_id;

                if($company_id === $company) {
                    return $response;
                }

                abort(403, '制限がありません。');
             }

  return redirect('company/creator/login');
        //       if(Auth::check()) {
        //     $company_id = Auth::user()->company_id;
        //     $id = Company::find('id',$company_id);
        //     if($company_id === $id){
        //         return $request;
        //     }
        // }

        // return $request;
        // abort(403, '企業IDが違います。');

    }
}
