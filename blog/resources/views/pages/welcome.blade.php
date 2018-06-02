@extends('main')
@section('title','|homepage')
@section('content')
    @section('stylesheet')
        <link rel="stylesheet" href="styles.css">
        @endsection

    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron">
                <h1>welcome to my blog</h1>
                <p class="lead">thankyou for visiting</p>
                <p><a class="btn btn-primary btn-lg" href="#" role="button">Popular posts</a></p>
            </div>
        </div>
    </div><!-- end of row-->
    <div class="row">
        <div class="col-md-8" >
            @foreach ($posts as $post)
            <div class="post">
                <h3>{{$post['title']}}</h3>
                <p>{{substr($post['body'],0,200)}}{{ strlen($post['body'])>50 ? "...." : "" }}</p>
                <a href="{{route('posts.show',$post['id'])}}" class="btn btn-sm btn-info">Read more</a>

                <hr>
            </div>
            @endforeach
                <div class="text-center">
                    {!! $posts->links(); !!}
                </div>

    </div>
@endsection
@section('script')

    @endsection