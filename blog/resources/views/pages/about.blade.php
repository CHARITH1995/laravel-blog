@extends('main')
@section('title','| About Page')
@section('content')
    <div>
        <div class="container-fluid">

            <div class="row content">
                <div class="col-sm-2 ">

                </div>
                <div class="col-sm-8 text-left">
                    <h2 class="title text-center bg-primary">Hello guys!!</h2>
                    <img src="image/6.jpg" class="img-circle"/>
                    <ul class="list-group">
                        <li class="list-group-item">My name is Charith Prasanna</li>
                        <li class="list-group-item">Student of University of Moratuwa Faculty of Information Technology</li>
                        <li class="list-group-item">Email - prasanna.charith32@gmail.com</li>
                        <li class="list-group-item">Facebook - <a href="https://www.facebook.com/charith.prasanna.73">https://www.facebook.com/charith.prasanna.73</a></li>
                        <li class="list-group-item">Linkedin - <a href="https://www.linkedin.com/in/charith-prasanna-32aa86146/">https://www.linkedin.com/in/charith-prasanna-32aa86146/</a> </li>
                        <li class="list-group-item">Github - <a href="https://github.com/CHARITH1995">https://github.com/CHARITH1995</a></li>
                    </ul>
                    <p>I have experience in <b>java , c , Laravel , Reactjs , nodejs , Mysql , mongodb , Javascript , Bootstrap , codeigniter , php </b> <br>
                        In my github account you can get this website's source code.if you like to  contribute it , I m very happy to get them.
                        <br>
                    </p>
                </div>
                <div class="col-sm-2">

                </div>
            </div>
        </div>
    </div>
    <style>
        .well{
            background-color: #00B0E8;
        }
        .text-left img{
            width:300px;
            height: 300px;
        }
        .title{
            margin-top:30px;
            margin-bottom:20px;
            padding:20px;
        }
        .text-left ul{
            margin-top:30px;

        }
        .text-left ul li a{
            text-decoration: none;
        }
    </style>
@endsection
@section('script')

@endsection

