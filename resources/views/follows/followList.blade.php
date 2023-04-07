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

<h1 >Follow list</h1>
<section class="follow">
<div class="followlist-all">
@foreach ($follows as $follow)
<a href="/other-profile/{{ $follow->id }}"><img src="{{ asset('storage/images/' . $follow->images)}}" style="width:80px;"></a>
@endforeach
</div>
</section>

<br>
@foreach ($follows as $follow)
<section>
<div class="followlist">
  <div class="followpost">
    <div>
  <a href="/other-profile/{{ $follow->id }}"><img src="{{ asset('storage/images/' . $follow->images)}}"
   style="width:80px;"></a>
  </div>
      <div class="user">
        <div>{{ $follow->username }}</div>
        <div>{{ $follow->posts }}</div>
      </div>
      <div>{{ $follow->created_at }}</div>
    </div>
</div>
</section>
@endforeach

@endsection

</body>
</html>
