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

{!! Form::open() !!}
<p class="welcome">DAWNSNSへようこそ</p>
{{ $errors->first('Mailadress')}}
{{ Form::label('MailAdress') }}</br>
<p>{{ Form::text('mail',null,['class' => 'input']) }}</p>
{{ $errors->first('password')}}
{{ Form::label('password') }}<br/>
<p>{{ Form::password('password',['class' => 'input']) }}</p><br/>
<p>{{ Form::submit('LOGIN',['class'=>'btn-primary']) }}</p><br/>
<p><a href="/register" class="register">新規ユーザーの方はこちら</a></p>

{!! Form::close() !!}
@endsection



</body>
</html>
