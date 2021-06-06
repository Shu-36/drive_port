@extends('layouts.app')

@section('content')
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
        //検索
        <form action="/" method="GET"class="form-inline my-2 my-lg-0 ml-2">
      <div class="form-group">
      <input type="search" class="form-control mr-sm-2" name="search"  value="{{request('search')}}" placeholder="キーワードを入力" aria-label="検索...">
      </div>
      <input type="submit" value="検索" class="btn btn-info">
  </form> 
       <div class="create">
           [<a href="/posts/create">新規作成</a>]
       <div class='posts'>
           @foreach($posts as $post)
                 <div class='post'>
                     <h2><a href="posts/{{ $post->id }}">{{ $post->title }}</a></h2>
                     <p class='body'>{{ $post->body }}</p>
                     <p class='category'>{{ $post->category->name }}</p>
                     <p class='created_at'>{{ $post->created_at }}</p>
                     
                 </div>
           @endforeach
       </div>
       <div class='paginete'>
           {{ $posts->links('vendor.pagination.default') }}
       </div>
    </body>
    
</html>
