@extends('main')
@section('title','|homepage')
@section('content')
    @section('stylesheet')
        <link rel="stylesheet" href="styles.css">
        @endsection

    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron">
                <div id="myCarousel" class="carousel slide text-center" data-ride="carousel">
                    <div class="cycle-slideshow"
                         data-cycle-fx="scrollHorz"
                         data-cycle-pause-on-hover="true"
                         data-cycle-speed="1000"
                    >
                        <ol class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>
                            <li data-target="#myCarousel" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner" role="listbox">
                            <div class="item active">
                                <img src="image/1.jpg" >
                            </div>
                            <div class="item">
                                <img src="image/2.jpg" />
                            </div>
                            <div class="item">
                                <img src="image/1.jpg" />
                            </div>
                        </div>
                        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
            </div>
        </div>
        </div>
    </div><!-- end of row-->
    <div class="row">
        <div class="col-md-8" >
            @foreach ($posts as $post)
            <div class="post">
                <h3>{{$post['title']}}</h3>
                <p>{{substr(strip_tags($post['body']),0,200)}}{{ strlen(strip_tags($post['body']))>50 ? "...." : "" }}</p>
                <a href="{{url('blog/'.$post['slug'])}}" class="btn btn-sm btn-info">Read more</a>

                <hr>
            </div>

            @endforeach


    </div>
    </div>
        <style>
            .carousel-control.right, .carousel-control.left {
                background-image: none;
                color: #CC1D7B;
            }
            .carousel-indicators li {
                border-color: #CC1D7B;
            }
            .carousel-indicators li.active {
                background-color: #CC1D7B;
            }
            .jumbotron{
                padding: 0px 0px 0px 0px;
                background-color:white;
            }
            .cycle-slideshow img{
                height: 691px;
                width:1550px;
            }
        </style>

@endsection




@section('script')

    @endsection