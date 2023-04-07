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
 <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="./js/script.js"></script>


@extends('layouts.login')

@section('content')


<div class="post1">
{!! Form::open(['url' => '/post/create']) !!}
<div>{{ Form::text('post',null,['class' => 'post']) }}</div>
<div>{{Form::submit('送信', ['class'=>'btn btn-primary btn-block'])}}</div><br/>
{!! Form::close() !!}
</div>
<div class='container'>
<section id="submission">
    @foreach ($posts as $post)
        <img src="storage/images/{{ $post->images }}" style="width:60px;">
        <div class="mission1">
            <div>{{ $post->username }}</div>
            <div>{{ $post->created_at }}</div>
            <div>{{ $post->posts }}</div>
        </div>
        <div>
    <div class="life-type">
    @if(Auth::id() == $post->user_id)
        <a href="" class="modalopen" data-target="modal{{ $post->id }}">
        <img src="{{ asset('images/edit.png')}}">
        </a>
    </div>
     @endif
    <div class="modal-main js-modal" id="modal{{ $post->id }}">
        <div class="modal-inner">
            <div class="inner-content">
                 <a class="send-button modalClose">Close</a>
            {{Form::open(['url' => '/post/update', 'files' => true])}}
        <p>{{ Form::text('posts',$post->posts,['class' => 'posts']) }}</p>
         <p>{{ Form::hidden('id',$post->id) }}</p>
        <p><input type="image" src="images/edit.png" alt=""></p>
    {{ Form::close() }}

            </div>
        </div>
    </div>
@if(Auth::id() == $post->user_id)
    <div class="card">
        <div class="front">
        <a href="/post/{{ $post->id }}/delete" onclick="return confirm('このつぶやきを削除します。よろしいでしょうか？')"><img src="{{ asset('images/trash.png')}}"></a>
        </div>
        <div class="back">
        <img src="{{ asset('images/trash_h.png')}}">
        </div>
    </div>
@endif

@endforeach
    </section>
</div>
@endsection

</body>
</html>
