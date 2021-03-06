<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;

class BlogController extends Controller
{
    public function getArchive(){
        $posts=Post::paginate(5);
        return view('news.index')->withPosts($posts);
    }

    public function getSingle($slug){
        $post=Post::where('slug',$slug)->first();
        return view('blog.single')->withPost($post);
    }
}
