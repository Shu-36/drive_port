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
       <form>
           {{ csrf_field() }}
           <div class="title">
               <h2>タイトル</h2>
               <input type="text" name="post[title]" placeholder="タイトルを入力してください">
           </div>
           <div class="body">
               <h2>本文</h2>
               <textarea name="post[body]" placeholder="おすすめの理由、周辺おすすめ駐車場など"></textarea>
           </div>
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
          
           <input type="submit" value="store">
            
       </form>
        <div id="maps"style="width:600px; height:200px"></div>
            <div class="address">
               <input id="address" type ="text">
               <button id="search">変換</button> 
            </div>
      <div class="back">[<a href="/posts">戻る</a>]</div>
      
    </body>
     <script>
          var search = document.getElementById('search');
          search.onclick = function(){
              var address = document.getElementById('address');
              var addressInput = address.value;
          };
          　 
          function initMap(){
              var map = document.getElementById('maps');
              console.log(map);
              let tokyoTower = {lat: 35.6585769, lng: 139.7454506};
              opt = {
                    zoom: 13, 
                    center: tokyoTower, 
                };
                mapObject = new google.maps.Map(map);
                
          }
      </script>
       <script src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key={{ config('app.google_key') }}&callback=initMap" async defer>
	   </script>
</html>
