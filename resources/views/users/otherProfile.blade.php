<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
</head>
<body>

@extends('layouts.login')

@section('content')


 <div class="other-profile">
  <div>
  <a href="/other-profile/{{ $user->id }}"><img src="/images/{{ $user->images }}"></a>
  </div>
  <div>
    <p class="other">Name</p>
    <p>{{ $user->username }}</p>
  </div>
  <div>
    <p class="other">Bio</p>
    <p>{{ $user->bio }}</p><br/>
  </div>
    @if($other_profile->contains('follow',$user->id))
  <a class="account3" href="/remfollow/{{ $user->id }}"><button style="background-color:#b22222; border:none; color:white; border-radius:2px; display: block; width: 120px; height: 36px">フォローをはずす</button></a>
  @else
<a  class="account3" href="/addfollow/{{ $user->id }}"><button style="background-color:#3C4767; border:none; color:white; border-radius:2px; display: block; width: 120px; height: 36px">フォローする</button>
<br>
 @endif
</div>
<div class="account2">
@foreach ($posts as $post)
<section>
<div>
<a href="/other-profile/{{ $post->id }}"><img src="/images/{{ $post->images }}"></a>
{{ $post->username }}
{{ $post->posts }}<br/>
{{ $post->created_at }}<br/>
</div>

  </section>
  @endforeach
@endsection


</body>
</html>
