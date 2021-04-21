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
        
        //検索機能
        //こだわり検索（別のbladeで/serchを作成)
       <div class='posts'>
           @foreach($posts as $post)
                 <div class='post'>
                     <h2 class='title'>{{ $post->title }}</h2>
                     <p class='body'>{{ $post->body }}</p>
                     <p class='created_at'>{{ $post->created_at }}</p>
                 </div>
           @endforeach
       </div>
       <div class='paginete'>
           {{ $posts->links('vendor.pagination.default') }}
       </div>
    </body>
</html>
