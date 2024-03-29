<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use DB;
use Auth;
use View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct(){
        $this->middleware(function($request,$next){

        $follow_count = DB::table('follows')
            ->where('follower',Auth::id())
            ->count();
        View::share('follow_count',$follow_count);

        $follower_count = DB::table('follows')
            ->where('follow',Auth::id())
            ->count();
        View::share('follower_count',$follower_count);

        return $next($request);
        });

    }
}
