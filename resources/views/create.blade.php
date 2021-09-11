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
       <form action = "{{ route('post.store') }}" method ="POST">
           {{ csrf_field() }}
           <div class="title">
               <h2>タイトル</h2>
               <input type="text" name="post[title]" placeholder="タイトルを入力してください">
           </div>
           @if ($errors->has('title'))
              <p class="">{{$errors->first('title')}}</li>
            @endif
           <div class="body">
               <h2>本文</h2>
               <textarea name="post[body]" placeholder="おすすめの理由、周辺おすすめ駐車場など"></textarea>
           </div>
           @if ($errors->has('body'))
              <li>{{$errors->first('body')}}</li>
            @endif
          <select
             id="category_id"
             name="post[category_id]"
             class="form-control {{ $errors->has('category_id') ? 'is-invalid' : '' }}"
             value="{{ old('category_id') }}"
           >
             
               @foreach($categories as $id => $name)
                <option value="{{ $id }}">{{ $name }}</option>
               @endforeach
              <!--<input type="submit" value="保存する">-->
        </select>
        @if ($errors->has('category_id'))
              <li>{{$errors->first('category_id')}}</li>
        @endif
        
      <button type="submit" class="btn btn-primary">登録する</button>
       </form>
        
      <div class="back">[<a href="{{ route('post.index') }}">戻る</a>]</div>
      
    </body>
     
</html>
