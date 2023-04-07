<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class PostsController extends Controller
{
    //

    public function post()
    {
        $post = DB::table('posts')
        ->join('users','posts.user_id','users.id','users.username')
        ->select('posts.*','users.username','users.images')
        ->where('users.id','=',Auth::id())
        ->get()
        ->sortByDesc('created_at');
        return view('posts.test',['post'=>$post]);
    }

    public function index()
    {
        $posts = DB::table('posts')
        ->join('users','posts.user_id','users.id','users.username')
        ->select('posts.*','users.username','users.images')
        ->get()->sortByDesc('created_at');
        // dd($posts);
        return view('posts.index',['posts'=>$posts]);
    }

    public function delete($id){
     \DB::table('posts')
       ->where('id',$id)
       ->delete();
     return redirect('/top');
    }

    public function create(Request $request){
        $post = $request->input('post');
        // dd($post);
        $id = Auth::id();
        DB::table('posts')->insert([
            'posts' => $post,
            'created_at' => now(),
            'updated_at' => now(),
            'user_id' => $id,
        ]);
        return redirect('/top');
    }

    public function update(Request $request){
        $request->validate([
            'posts' => ['max:200'],
            ],[
            'username.max' => '200文字以内で入力してください',
            ]);

        $post = $request->input('posts');
        // dd($post);
        $id = $request->input('id') ;
        DB::table('posts')
        ->where( 'id',$id)
        ->update([
            'posts' => $post,
            'updated_at' => now(),
        ]);
        return redirect('/top');
    }
}

?>
