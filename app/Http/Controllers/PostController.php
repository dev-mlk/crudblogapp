<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create( Request $request)
    {
        $request->validate([
            'title' => 'required|unique:posts|max:255',
            'content' => 'required'
          ]);
          $post = new Post();
          $post->title = $request->title;
          $post->content = $request->content;
          $post->save();
          return redirect('/posts');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'content'=>'required'
        ]);
        $post = new Post([
            'title'=>$request->get('title'),
            'content'=>$request->get('content')
        ]);
        $post->save();
        redirect('/posts')->with('successful save Post');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $posts = Post::all();
        return view('posts.posts-list', ['posts' => $posts]);  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit(Request $request)
    {
      $post = Post::find($request->id);
      return view('posts.edit-post', ['post' => $post]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
            'title' => 'required|max:255',
            'content' => 'required'
          ]);
          $post = Post::find($request->id);
          $post->title = $request->title;
          $post->content = $request->content;
          $post->update();
          return redirect('/posts')->with('Successful updated post');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getDeletePost($post_id)
    {
        $post =Post::where('id', $post_id)->first();
    
        if ($post != null) {
            $post->delete();
            return redirect('/posts')->with(['message'=> 'Successfully deleted!!']);
        }
    
        return redirect('/posts')->with(['message'=> 'Wrong ID!!']);
    }

}
