<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
   @foreach ($mypost as $post)
    <img src="storage/images/{{ $post->images }}" style="width:60px;">
            <div>{{ $post->username }}</div>
            <div>{{ $post->created_at }}</div>
            <div>{{ $post->posts }}</div>
        </div>
   @endforeach
</body>
</html>
