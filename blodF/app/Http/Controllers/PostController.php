<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Rap2hpoutre\FastExcel\FastExcel;

class PostController extends Controller
{
    //way 1
    public function __construct()
    {
        // $this->middleware("auth");
        // $this->authorizeResource(Post::class, 'post');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = [];
        if (Auth::user()->is_admin) {
            $posts = Post::paginate(5);
        } else {
            $posts = Post::where('user_id', Auth::user()->id)->paginate(5);
        }
        return view('admin.posts', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.createPost")
            ->with('cateogries', Category::get())
            ->with('tags', Tag::get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //set user id to request array
        $request['user_id'] = $request->user()->id;
        $post = Post::create($request->except('tag_id'));
        $post->tags()->attach($request->tag_id);
        return redirect('/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        // //Way1
        // $this->authorize('view' , $post);
        // //Way 2
        // if (request()->user()->cannot('view' , $post)) {
        //     return "You not own this post!";
        // }
        return view("admin.showPost", ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        if (Gate::denies('update_post', $post)) {
            return redirect("/");
        }
        return view("admin.editPost")
            ->with('post', $post)
            ->with('cateogries', Category::get())
            ->with('tags', Tag::get());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $post->title = $request->title;
        $post->body = $request->body;
        $post->category_id = $request->category_id;
        $post->tags()->sync($request->tag_id);
        $post->save();
        return redirect('/posts');
        // return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        $post->tags()->detach();
        return redirect('/posts');
    }

    public function publish(Post $post)
    {
        $post->published = !$post->published;
        $post->save();
        return redirect('/posts');
    }
    public function excel()
    {
        // Load posts
        $posts = Post::all();

        // Export all posts
        return (new FastExcel($posts))->download(now() . '-' . 'posts.xlsx');
    }
}
