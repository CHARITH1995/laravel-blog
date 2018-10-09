@extends('main')
@section('title',"| $post->title")
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>
    tinymce.init({
        selector:'textarea',
        plugins:'link code',

    });
</script>
@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset" >
            <img src="{{asset('images/' . $post->image)}}" width="800" height="500" />
            <h1>{{ $post['title'] }}</h1>
            <p> {!! $post['body']  !!}</p>
            <hr>
            <p> Posted in:{{$post->category->name}}</p>
        </div>
    </div>
    <div class="row col-md-8 col-md-offset">
        <h3 class="comment-title"><span class="glyphicon glyphicon-comment"></span>{{$post->comments()->count() }} Comments</h3>
        @foreach($post->comments as $comment)
            <hr>
            <div class="comment">
                <div class="author-info">
                    <img src="{{"https://www.gravatar.com/avatar/" . md5(strtolower(trim($comment->email))) . "?s=50&d=monsterid"}}" class="author-image">

                    <div class="author-name">
                        <h4> {{$comment->name}}</h4>
                        <div class="author-time">
                            <p> {{date('M j,Y H:ia',strtotime($comment->created_at))}}</p>
                        </div>

                    </div>


                </div>
                <div class="comment-content">
                    {{strip_tags($comment->comment)}}
                </div>

            </div>
            <hr>
            @endforeach
    </div>

    <div class="row">
        <div id="comment-form" class=col-md-offset-2" style="margin-top:50px;">
            {{Form::open(['route'=>['comments.store',$post['id']],'method'=>'POST'])}}
            <div class="col-md-6">
                {{Form::label('name',"Name :")}}
                {{Form::text('name',null,['class'=>'form-control'])}}

            </div>
            <div class="col-md-6">
                {{Form::label('email',"Email :")}}
                {{Form::text('email',null,['class'=>'form-control'])}}

            </div>
            <div class="col-md-12">
                {{Form::label('comment',"Comment :")}}
                {{Form::textarea('comment',null,['class'=>'form-control','row'=>'3'])}}

                {{Form::submit('post comment',['class'=>'btn btn-success btn-sm','style'=>'margin-Top:50px;'])}}

            </div>
        </div>

    </div>

@endsection