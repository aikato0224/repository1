@extends('layouts.login')

@section('content')
<div class="keyword">
{!! Form::open(['url' => '/search']) !!}
    {!! Form::input('text', 'keyword', null, ['required', 'class' => 'form-control', 'placeholder' => 'ユーザー名で検索']) !!}
   <a href="/result"> {!! form::submit('検索', ['class' => 'search-bt']) !!}</a>
{!! Form::close() !!}
<div class="keyword2">
@if(!empty($keyword))
検索ワード：{{ $keyword }}
@endif
</div>
</div>
<br><hr class="search-border" style="width: 1000px;"><br/>

@foreach ($users as $user)
<div class="account">
   <div class="account1">
  <img src="{{ asset('storage/images/' . $user->images)}}" style="width:60px;">

  {{ $user->username }}
  </div>
  <div>
  @if($followed->contains('follow',$user->id))
  <a class="account3" href="remfollow/{{ $user->id }}"><button style="background-color:#b22222; border:none; color:white; border-radius:2px; display: block; width: 120px; height: 36px">フォローをはずす</button></a>
  @else
  <a  class="account3" href="addfollow/{{ $user->id }}"><button style="background-color:#3C4767; border:none; color:white; border-radius:2px; display: block; width: 120px; height: 36px">フォローする</button></a>
  @endif
    <br>
  </div>
</div>

@endforeach

@endsection
