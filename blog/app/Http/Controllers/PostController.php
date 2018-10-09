<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Post;
use App\Category;
use Illuminate\Support\Facades\Session;
use Mews\Purifier\Purifier;
use Image;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $posts=Post::orderBy('id','desc')->paginate(5);
        return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view ('posts.create')->withCategories($categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'title'      =>'required|max:255',
            'body'       =>'required',
            'category_id'=>'required|Integer',
            'slug'       =>'required|alphadash|min:5|max:255|unique:posts,slug'
        ]);

        $post = new Post;
        $post->title=$request->title;
        $post->body=$request->body;  //Purifier::clean();
        $post->slug=$request->slug;
        $post->category_id = $request->category_id;


        if ($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
           // $destinationPath = base_path() . 'public/images/'. $filename;
            $location = public_path('images/' . $filename);
            Image::make($image)->resize(800, 400)->save($location);
            $post->image = $filename;
        }
            $post->save();



        Session::flash('success','blog post successfully saved');
        return redirect()->route('posts.show',$post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->withPost($post);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post =Post::find($id);
        $categories = Category::all();
        $cats=[];
        foreach($categories as $category){
            $cats[$category->id] = $category->name;
        }




        return view('posts.edit')->withPost($post)->withCategory($cats);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);

        if($request->input('slug')==$post['slug']){
            $this->validate($request,[
                'title'=>'required|max:255',
                'category_id'=>'required|Integer',
                'body'=>'required'

            ]);

        }else{
            $this->validate($request,[
                'title'=>'required|max:255',
                'body'=>'required',
                'category_id'=>'required|Integer',
                'slug'=>'required|min:5|max:255|unique:posts,slug'
            ]);
        }

        $post = Post::find($id);
        $post-> title = $request->input('title');
        $post-> body = $request->input('body'); //Purifier::clean();
        $post-> slug = $request->input('slug');
        $post-> category_id = $request->input('category_id');

        $post->save();




        Session::flash('success','This post is successfully saved.');
        return redirect()->route('posts.show',$post['id']);



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        Session::flash('success','the post successfully deleted');
        return redirect()->route('posts.index');
    }
}
