<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Validation\Rule;
use DB;

class UsersController extends Controller
{
    //
    public function otherProfile($id){
        $other_profile = DB::table('follows')
        ->where('follower',Auth::id())
        ->get();

        $posts = DB::table('users')
    ->join('posts','users.id','posts.user_id')
    ->where('users.id',$id)
    ->select('users.id','users.username','users.images','posts.posts','posts.created_at')
        ->get();
        $user = DB::table('users')
        ->where('id','=',$id)
        ->select('users.id','users.username','users.images','users.bio')
        ->first();
        return view('users.otherProfile',['other_profile'=>$other_profile,'user'=>$user,'posts'=>$posts]);

    }


    public function profile(){
        return view('users.profile');
    }

    public function profileUpdate(Request $request)
    {
        $request->validate([
        'username' => ['min:4', 'max:12'],
        'mail' => ['email','min:4','max:12','unique:users'],
        'password' => ['required','min:4','max:12','unique:users','regex:/^[a-zA-Z0-9]+$/',],
        'bio' => ['max:200'],
        'icon-image' =>['mimes:gif,svg,png,bmp,jpg'],

        ],[
            'username.min' => '4文字以上で入力してください',
            'username.max' => '12文字以内で入力してください',
            'mail.email' => 'メールアドレスではありません',
            'mail.min' => '4文字以上で入力してください',
            'mail.max' => '12文字以内で入力してください',
            'mail.unique' => 'すでに登録済です',
            'password.required' => '必須項目です',
            'password.min' => '4文字以上で入力してください',
            'password.max' => '12文字以内で入力してください',
            'password.regex' => '英数字で入力してください',
            'bio,max' =>'200文字以内で入力してください',
            'icon-image.mimes' => 'gif,svg,png,bmp,jpgファイル以外は不可',
        ]);
         $username = $request->input('username');
         $mail_adress = $request->input('mail');
         $password = $request->input('Password');
         $new_password = $request->input('newpassword');
         $bio = $request->input('bio');
         $iconimage = $request->file('icon-image');
         DB::table('users')
            ->where('id', Auth::id())
            ->update(
                [
                    'username' => $username,
                    'mail' => $mail_adress,
                    'bio' => $bio,
                ]
            );

        if(isset($new_password)){
            DB::table('users')
            ->where('id', Auth::id())
            ->update(
                [
                    'password' =>bcrypt($new_password),
                ]
            );
        }

        if(isset($iconimage)){
            $iconname = $iconimage->getClientOriginalName();
             DB::table('users')
            ->where('id', Auth::id())
            ->update(
                [
                    'images' =>$iconname,
                ]
            );
            $iconimage->storeAs('images', $iconname , 'public');
        }
       return redirect('/profile');
    }


    public function passwordUpdate()
    {
        return redirect()->route('articles_index')->with('msg_success', 'パスワードの更新が完了しました');
    }

    public function search(){
        $followed = DB::table('follows')
        ->where('follower',Auth::id())
        ->get();
        //dd($followed);
        $users = DB::table('users')
        ->where('id','!=',Auth::id())
        ->get();
        $keyword = null;
        return view('users.search',compact('followed','users','keyword'));


    }

     public function result(Request $request){
        $keyword = $request->input('keyword');
        $followed = DB::table('follows')
        ->where('follower',Auth::id())
        ->get();
        $users = DB::table('users')
                ->where('username','LIKE','%'.$keyword.'%')
                ->get();
        return view('users.search',compact('followed','users','keyword'));
    }


    public function addfollow($id){
        DB::table('follows')->insert(['follow'=>$id,'follower'=>Auth::id()]);
        return back();
    }

    public function remfollow($id){
        DB::table('follows')
        ->where('follow',$id)
        ->where('follower',Auth::id())
        ->delete();
        return back();
    }

}
// こんにちは
