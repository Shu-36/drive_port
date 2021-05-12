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
    <h1　class="title">編集画面</h1>
    <div class='content'>
        <form action="/posts/{{ $post->id }}" method="POST">
           @csrf
           @method('PUT')
           <div class="content__title">
               <h2>タイトル</h2>
               <input type="text" name="post[title]" value="{{ $post->title }}">
           </div>
           <div class="content__body">
               <h2>本文</h2>
               <textarea type="text" name="post[body]" >{{ $post->body }}</textarea>
           </div>
           <select
            id="category_id"
            name="category_id"
            class="form-control {{ $errors->has('category_id') ? 'is-invalid' : '' }}"
            >
               @foreach($categories as $id => $name)
                <option value="{{ $id }}"
                    @if ($post->category_id == $id)
                      selected
                    @endif
                >{{ $name }}</option>
               @endforeach
           </select>
         <input type="submit" value="保存">
       </form>
      </div> 
      <div class="back">[<a href="/posts/{{ $post->id }}">戻る</a>]</div>
    </body>
</html>