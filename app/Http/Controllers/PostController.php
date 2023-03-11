<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;

use Illuminate\Support\Facades\Cache;

class PostController extends Controller
{
    public function index()
    {
        //Pagination cache memory
        if (request()->page) {
            $key = 'posts' . request()->page;
        }else {
            $key = 'posts';
        }
        //Using Cache Facade
        if (Cache::has($key)) {
            $posts = Cache::get($key);
        }else{
            //Query DB
            $posts = Post::where('status',2)->latest('id')->paginate(8);
            Cache::put($key,$posts);
        }

        //$posts = Post::where('status',2)->latest('id')->paginate(8);
        return view('posts.index', compact('posts'));
    }

    public function show(Post $post)
    {
        $this->authorize('published', $post);
        //return $post;
        $filtered = Post::where('category_id', $post->category_id)
            ->where('status', 2)
            ->where('id', '!=', $post->id)
            ->latest('id')
            ->take(4)
            ->get();

        return view('posts.show', compact('post', 'filtered'));
    }

    public function category(Category $category)
    {
        $posts = Post::where('category_id', $category->id)
            ->where('status', 2)
            ->latest('id')
            ->paginate(6);

        return view('posts.category', compact('posts', 'category'));
        //return $category;
    }

    public function tag(Tag $tag)
    {
        $posts = $tag->posts()->where('status', 2)
            ->latest('id')
            ->paginate(4);
        return view('posts.tag', compact('posts', 'tag'));
        //return $tag;
    }
}
