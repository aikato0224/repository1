<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>

@extends('layouts.logout')

@section('content')

<div id="clear">
<p>{{ $user }}さん、</p>
<p class="loginsns">ようこそ！DAWNSNSへ</p>
<p>ユーザー登録が完了しました。</p>
<p>さっそく、ログインをしてみましょう。</p>

<a href="/login" style="width:130px;height:50px;background:white;">ログイン画面へ</a>
</div>

@endsection


</body>
</html>
