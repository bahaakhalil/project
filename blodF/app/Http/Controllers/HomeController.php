<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view("home" , ['posts' => Post::get()]);
        return view("home")->with('posts', Post::get());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view("post", ["post" => $post]);
    }

    public function saveComment(Request $request ,Post $post)
    {
         $post->comments()->create([
             'content' => $request->content
         ]);
        // $comment = new Comment();
        // $comment->content = $request->content;
        // $comment->post_id = $id;
        // $comment->save();
        return redirect("/" . $post->id);
    }

    public function search($text)
    {
        $posts = Post::where('title' , 'LIKE' , "%$text%")->get();
        return view("_posts" , ['posts' => $posts]);
    }
}
