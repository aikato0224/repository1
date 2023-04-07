<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class FollowsController extends Controller
{
    //
    public function followList(){
        $follows = DB::table('users')
        ->join('follows','users.id','follows.follow')
        ->leftjoin('posts','users.id','posts.user_id')
        ->select('users.id','users.username','users.images','posts.posts','posts.created_at')
        ->where('follows.follower',Auth::id())
        ->where('users.id','!=',Auth::id())
        ->groupBy('users.id')
        ->get()->sortByDesc('created_at');
        // dd($follows);
        return view('follows.followList',compact('follows'));
    }
    public function followerList(){
    $followers = DB::table('users')
    ->join('follows','users.id','follows.follower')
    ->leftjoin('posts','users.id','posts.user_id')
    ->select('users.id','users.username','users.images','posts.posts','posts.created_at')
    ->where('follows.follow',Auth::id())
    ->groupBy('users.id')
    ->get()->sortByDesc('created_at');
    return view('follows.followerList',compact('followers'));
}
}
