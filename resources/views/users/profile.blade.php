<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
      <link rel="stylesheet" href="{{ asset('css/reset.css')}}">
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
</head>
<body>
@extends('layouts.login')

@section('content')



<div style="margin:0 auto;">
<div class="profile-form">

{{Form::open(['url' => '/profile', 'files' => true])}}
<div class="form">
{{ $errors->first('username')}}
{{ Form::label('Username') }}
{{ Form::text('username',Auth::user()->username,['class' => 'profile']) }}<br/>
</div>
<div class="form">
{{ $errors->first('mail')}}
{{ Form::label('MailAdress') }}
{{ Form::text('mail',Auth::user()->mail,['class' => 'profile']) }}</>
</div>
<div class="form">
{{ Form::label('Password') }}
{{ Form::label('password',Auth::user()->password,['class' => 'profile']) }}<br/>
</div>
<div class="form">
{{ $errors->first('password')}}
{{ Form::label('new Password') }}
{{ Form::password('password',['class' => 'profile']) }}<br/>
</div>
<div class="form">
{{ $errors->first('bio')}}
{{ Form::label('Bio') }}
{{ Form::text('bio',Auth::user()->bio,['class' => 'profile']) }}<br/>
</div>
<div class="profilepost">
  {{ $errors->first('icon-image')}}
{{ Form::label('Icon image',) }}
{{ Form::file('icon-image',['class' => 'profile']) }}<br/>
</div>
<input type="submit", value="更新">
</tr>
{{ Form::close() }}
</table>
</div>

</div>


@endsection
</body>
</html>
