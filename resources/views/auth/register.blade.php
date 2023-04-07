<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="{{ asset('css/reset.css')}}">
  <link rel="stylesheet" href="{{ asset('css/style.css')}}">
</head>
<body>

@extends('layouts.logout')

@section('content')
<body>
{!! Form::open() !!}
<section class=register-wrapper>
<h2>新規ユーザー登録</h2><br/>

{{ $errors->first('username')}}
{{ Form::label('Username') }}<br/>
<p>{{ Form::text('username',null,['class' => 'input']) }}</p>
{{ $errors->first('mail')}}
{{ Form::label('MailAdress') }}<br/>
<p>{{ Form::text('mail',null,['class' => 'input']) }}</p>
{{ $errors->first('password')}}
{{ Form::label('Password') }}<br/>
<p>{{ Form::password('password', ['class' => 'input']) }}</p>
{{ $errors->first('password_confirmation')}}
{{ Form::label('Password comfirm') }}<br/>
<p>{{ Form::password('password_confirmation',['class' => 'input']) }}</p>

<p>{{ Form::submit('REGISTER',['class'=>'btn-primary']) }}</p>
{!! Form::close() !!}

<p><a href="/login" class="register">ログイン画面へ戻る</a></p>
</section>
</body>
@endsection
</body>
</html>
