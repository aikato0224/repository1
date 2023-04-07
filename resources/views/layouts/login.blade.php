<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title></title>
    <link rel="stylesheet" href="{{ asset('css/reset.css')}}">
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="./js/script.js"></script>
    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--サイトのアイコン指定-->
    <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
    <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
    <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
    <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
    <!--iphoneのアプリアイコン指定-->

    <!--OGPタグ/twitterカード-->

</head>
<body>

    <header>


        <h1><a href="/top"><img src="{{ asset('images/main_logo.png')}}"></a></h1>
        <div id="container">
<div class="dropdown">
        <li><?php $user = Auth::user(); ?>{{ $user->username }}さん
        <ul class="submenu" >
            <li><a href="/top">HOME</a></li>
            <li><a href="/profile">プロフィール編集</a>
            <li><a href="/logout">ログアウト</a>
        </li>
        </ul>
        </li>
        <p><img src="{{ asset('storage/images/' . $user->images)}}" style="width:50px;"></p>
</div>

        </div>

            <div id="">
                <div id="">
        </div>
    </header>
    <script>
    $(function(){
  $('.dropdown>li').on('click', function(){
    $(this).toggleClass('dropdown_toggle').children('.submenu').slideToggle(200);
  });
});

</script>
    <div id="row">
        <div id="container">
            @yield('content')
        </div >
        <div id="side-bar">
            <div id="confirm">
                <div class="side-box1">
                <p class="account-name"><?php $user = Auth::user(); ?>{{ $user->username }}さんの</p>
                <p>フォロー数</p><p>{{ $follow_count }}名</p>
                </div>
                <p><a href="/follow-list"><button class="btn-list" style="background-color:#3C4767; border:none; color:white; border-radius:2px; display: block; width: 120px; height: 36px;">フォローリスト</button></a></p>
                <div>
                <p>フォロワー数{{ $follower_count }}名</p>
                </div>
                <p><a href="/follower-list"><button class="btn-list" style="background-color:#3C4767; border:none; color:white; border-radius:2px; display: block; width: 120px; height: 36px">フォロワーリスト</button></a></p>
            </div>
            <br><hr style="width: 250px;"><br/>
            <p class="btnlist1"><a href="/search"><button style="background-color:#3C4767; border:none; color:white; border-radius:2px; display: block; width: 120px; height: 36px; display: inline-block;">ユーザー検索</button></a></p>
        </div>
    </div>
    <footer>
    </footer>
</body>
</html>
