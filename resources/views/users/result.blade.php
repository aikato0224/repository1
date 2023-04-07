@extends('layouts.login')

@section('content')

{!! Form::open(['url' => '/search']) !!}
    {!! Form::input('text', 'keyword', null, ['required', 'class' => 'form-control', 'placeholder' => 'ユーザー名で検索']) !!}
   <a href="/result"> {!! form::submit('検索', ['class' => 'ボタンのデザイン']) !!}</a>
{!! Form::close() !!}
<br><hr style="width: 1000px;"><br/>
@if(!empty($keyword))
ユーザー名：{{ $keyword }}
@endif

@foreach ($users as $user)
    <img src="images/{{ $user->images }}">
    {{ $user->username }}
  <a href="addfollow/{{ $user->id }}"><button>フォローする</button></a>
  <button>フォローをはずす</button>

    <br>

@endforeach

@endsection
