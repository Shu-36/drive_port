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
       <div class="container mt-4">
        <div class="border p-4">
        <h1 class="h4 mb-4 font-weight-bold">新規作成</h1>
        
         <fieldset class="mb-4">
       <form action = "{{ route('post.store') }}" method ="POST">
           {{ csrf_field() }}
           
     <div class="form-group">
         <h2 class="mt-4"><label for="subject">タイトル </label></h2>
               <input class="form-control" type="text" name="post[title]" placeholder="タイトルを入力してください" value="{{ old('title') }}">
           @if ($errors->has('title'))
              <p class="">{{$errors->first('title')}}</li>
            @endif
      <div class="form-group">
         <h2 class="mt-4"><label for="subject">本文 </label></h2>
               <textarea class="form-control" name="post[body]" placeholder="おすすめの理由、周辺おすすめ駐車場など" value="{{ old('body') }}"></textarea>
           @if ($errors->has('body'))
              <li>{{$errors->first('body')}}</li>
            @endif
     <div class="form-group">
         <h2 class="mt-4"><label for="subject">カテゴリー </label></h2>
          <select
             id="category_id"
             name="post[category_id]"
             class="form-control {{ $errors->has('category_id') ? 'is-invalid' : '' }}"
             value="{{ old('category_id') }}"
           >
             
               @foreach($categories as $id => $name)
                <option value="{{ $id }}">{{ $name }}</option>
               @endforeach
        </select>
        @if ($errors->has('category_id'))
              <li>{{$errors->first('category_id')}}</li>
        @endif
        
      <button type="submit" class="btn btn-primary">登録する</button>
       </form>
        
    <a href="{{ route('post.index') }}">
        <button type="button" class="btn btn-secondary">戻る</button>
    </a>
    </fildset>
    </div>
    </div>
    
      
    </body>
     
</html>
