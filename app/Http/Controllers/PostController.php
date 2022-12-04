<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
//        $posts = Post::all();
        $posts = Post::find(2);
        $tag = Tag::find(2);
        dd($tag->posts);
        return view('post.index', compact('posts'));

    }
    public function create()
    {
         return view('post.create');
    }
    public function store()
    {
        $data = \request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string'
        ]);
        Post::create($data);
        return redirect()->route('post.index');
    }
    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }
    public function edit(Post $post)
    {
        return view('post.edit', compact('post'));
    }
    public function update(Post $post)
    {
        $data = \request()->validate([
            'title' =>'string',
            'content' =>'string',
            'image' =>'string'
        ]);
        $post->update($data);
        return redirect()->route('post.show', $post->id);
    }
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index');
    }
    public function delete()
    {
        $post = Post::find(2);
        $post->delete();
        dd("deleted");
    }
    public function restore()
    {
        $post = Post::withTrashed()->find(2);
        $post->restore();
        dd("restore");
    }
    function firstOrCreate()
    {

        $anotherPost = [
            'title' => 'some post',
            'content' => 'some content',
            'image' => 'some_imageblabla.jpg',
            'likes' => 10000,
            'isPublished' => 1,
        ];
        $post = Post::firstOrCreate([
            'title' => 'some title phpstorm',
        ], $anotherPost);
        dump($post->content);
        dd('finished');
    }
    public function updateOrCreate()
    {
        $anotherPost = [
            'title' => 'Not updateOrCreate some post',
            'content' => 'Not updateOrCreate some content',
            'image' => 'Not updateOrCreate_imageblabla.jpg',
            'likes' => 520,
            'isPublished' => 1,
        ];
        $post = Post::updateOrCreate([
            'title' => 'Not updateOrCreate some post',
        ], $anotherPost);
        dd('finished');
    }
}
