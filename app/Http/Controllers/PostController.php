<?php

namespace App\Http\Controllers;

use App\Post, App\Category;
use App\Users;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBlogPost;

class PostController extends Controller
{
  //'posts'は複数の記事を扱うもの、'post'は単体の記事に対して
    public function index(Post $post, Request $request)
   {
     //検索
     if($request['search']){
        $search = $request['search'];
        $posts = Post::orderBy('created_at', 'asc')->where('title', 'LIKE', "%{$search}%")->orWhere('body','LIKE', "%{$search}%")->paginate(8);
     }else{
      // $posts = Post::paginate(8);
       $posts = \DB::table('posts')
                  ->join('categories', 'categories.id', '=', 'posts.category_id')
                   ->join('users', 'users.id', '=', 'posts.user_id')
                   ->select([
                     'posts.id as post_id',
                     'posts.title',
                     'posts.body',
                     'posts.created_at as post_created_at',
                     'users.name as user_name',
                     'categories.name as category_name',
                   ])
                   ->paginate('8');
     }
      return view ('index')->with(['posts' => $posts]);
      
    }
    
  public function show(Post $post)
  {
    //'post'は連想配列の考え方（この場合はshow.blade.phpで使われるときのキー名を指定している。）
      return view ('show')->with(['post'=>$post]);
  }
  public function create(Category $category, Post $post)
  {
      //prependメソッドで配列に任意の項目の選択をできるようにする
      $post = Post::all();
      $categories = $category->getLists()->prepend('ドライブシーンを選択','');
      return view('create')->with(['categories' => $categories, 'post'=>$post]);
  }
  
  public function store(StoreBlogPost $request, Post $post)
  {
      //$request['post']はcreateで作ったformのnameを参照
      //基本的にはrequestは入力情報についてのことを書く。
      
      // $input = $request['post'];
      //'user_id'をnameを参考にできないが保存したいのでこのように書き表せる。
      // $input['user_id'] = auth()->user()->id;
      // $data = ['post'=>$request->input('post')
              // 'user_id'=>$request->auth()->user()->id
      // ];
      $data = $request['post'];
      $data['user_id'] = auth()->user()->id;
      // dd($post);
      $post->fill($data)->save();
      
      return redirect()->route('post.show', $post->id);
  }
  public function edit($id)
  {
    $post = new Post;
    $category = new Category;
    $categories = $category->getLists();
    
    //findOrFallで見つからなかった時にエラー画面
    $post = Post::findOrFail($id);
    return view('edit')->with(['post' => $post, 'categories' => $categories]);
  }
  public function update(Request $request, Post $post)
  {
    $input_post = $request['post'];
    $input_post['user_id'] = auth()->user()->id;
    $post->fill($input_post)->save();
    return redirect('/posts/' . $post->id);
    
  }
  public function delete(Post $post)
  {
    $post->delete();
    return redirect('/');
  }
  
  
}
