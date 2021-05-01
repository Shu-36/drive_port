<?php

namespace App\Http\Controllers;
use App\Post;
use App\Users;
use Illuminate\Http\Request;

class PostController extends Controller
{
  //'posts'は複数の記事を扱うもの、'post'は単体の記事に対して
    public function index(Post $post)
    {
      return view ('index')->with(['posts'=>$post->getPaginateBylimit()]);
    }
  public function show(Post $post)
  {
    //'post'は連想配列の考え方（この場合はshow.blade.phpで使われるときのキー名を指定している。）
      return view ('show')->with(['post'=>$post]);
  }
  public function create()
  {
      return view('create');
  }
  public function store(Request $request, Post $post)
  {
      //$request['post']はcreateで作ったformのnameを参照
      //基本的にはrequestは入力情報についてのことを書く。
      $input = $request['post'];
      //'user_id'をnameを参考にできないが保存したいのでこのように書き表せる。
      $input['user_id'] = auth()->user()->id;
      $post->fill($input)->save();
      return redirect('/posts/' . $post->id);
  }
  public function edit(Post $post)
  {
    return view('edit')->with(['post' => $post]);
  }
  public function update(Request $request, Post $post)
  {
    $input_post = $request['post'];
    $input_post['user_id'] = auth()->user()->id;
    $post->fill($input_post)->save();
    return redirect('/posts/' . $post->id);
    
  }
  
}
