<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>drive</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

       
    </head>
    <body>
       <form action="/posts" method="POST">
           {{ csrf_field() }}
           <div class="title">
               <h2>タイトル</h2>
               <input type="text" name="post[title]" placeholder="タイトルを入力してください">
           </div>
           <div class="body">
               <h2>本文</h2>
               <textarea name="post[body]" placeholder="おすすめの理由、周辺おすすめ駐車場など"></textarea>
           </div>
           <input type="submit" value="store">
       </form>
      <div class="back">[<a href="/posts">戻る</a>]</div>
    </body>
</html>
