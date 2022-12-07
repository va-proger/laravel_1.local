<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;

class CreateController extends BaseController
{
    public function __invoke()
    {
        $posts = Post::all();
        $tags = Tag::all();
        $categories = Category::all();
        return view('admin.post.create', compact('categories','tags', 'posts' ));
    }
}
