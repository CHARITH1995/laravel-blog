<?php
/**
 * Created by PhpStorm.
 * User: charyth
 * Date: 4/5/2018
 * Time: 8:25 PM
 */
namespace App\Http\Controllers;
use App\Post;
class PagesController extends Controller{
    public function getIndex(){
        $posts= Post ::orderBy('id','asc')-> paginate(5);
        return view('pages.welcome')->withPosts($posts);
    }
    public function About(){
        $first="charith";
        $last="prasanna";
        $fullname= $first." ".$last;
        $email="prasannacharith32@gmail.com";
        $data=[];
        $data['email']=$email;
        $data['fullname']=$fullname;
        //return view('pages.about')->with("fullname",$fullname)->with("email",$email);
        //return view('pages.about')->with("fullname",$data['fullname'])->with("email",$data['email'])
        return view('pages.about')->withData($data);
    }
    public function getContact(){
        return view('pages.contact');
    }

}