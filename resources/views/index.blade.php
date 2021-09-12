@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
 <div class="container">
  <div class="row">
    <div class="col">
           <h2>投稿一覧</h2>
    </div>
    <div class="col">
        <form action="/" method="GET"class="form-inline my-2 my-lg-0 ml-2">
              <div class="form-group">
              　　<input type="search" class="form-control mr-sm-2" name="search"  value="{{request('search')}}" placeholder="キーワードを入力" aria-label="検索...">
              </div>
              <input type="submit" value="検索" class="btn btn-info">
     　</form> 
    </div>
  </div>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

       
    </head>
    <body>
       <div class="create">
           <a href="/posts/create"><button type="button" class="btn btn-primary">新規作成</button></a>
        </div>
       <div class='posts'>
           @foreach($posts as $post)
     <div class="container mt-4">
        <div class="border p-4">
                   <h1 class="mb-4 font-weight-bold">{{ $post->user_name }}</h1>
                   <h3 class="mt-3">タイトル</h3> <a href="posts/{{ $post->post_id }}">{{ $post->title }}</a>
                   <h3 class="mt-3"> 本文　</h3> <p class='body'>{{ $post->body }}</p>
                    <h3 class="mt-3"> カテゴリー</h3><p class='category'>{{ $post->category_name }}</p>
                   <h3 class="mt-3"> 作成日</h3> <p class='created_at'>{{ $post->post_created_at }}</p>
        </div>
     </div>
           @endforeach
       </div>
       <div class='paginete'>
           {{ $posts->links('vendor.pagination.default') }}
       </div>
    </body>
    
</html>
