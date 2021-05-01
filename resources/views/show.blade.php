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
        //次にすることはPost.phpでメソッドを入れてuser_idのキーとのリレーション（PostControllerじゃないのはPost.phpをPostControllerが継承しているから）
        {{ $post }}
        <h1 class="title">
            {{ $post->title }}
        </h1>
        <div class="content">
            <div class="content__post">
                <h3>本文</h3>
                {{ $post->body }}
            </div>
        </div>
        <p class="edit">[<a href="/posts/{{ $post->id }}/edit">編集</a>]</p>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>
