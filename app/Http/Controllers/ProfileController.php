<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\User;

class ProfileController extends Controller
{
    public function show()
    {
            /**
     * プロフィール編集画面表示
     * @param
     * @return View プロフィール編集画面
     */
        return view('user.profile');
    }

    /**
     * プロフィール編集機能（ユーザー名、メールアドレス）
     * @param
     * @return Redirect 一覧ページ-メッセージ（プロフィール更新完了）
     */

    public function ProfileUpdate(Request $request)
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
        return redirect()->route('articles_index')->with('msg_success', 'プロフィールの更新が完了しました');
    }


}
