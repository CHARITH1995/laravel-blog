@extends('main')
@section('title','|category page')
@section('content')
    <div class="row">
        <div class="col-md-8 ">
            <h1>Categories</h1>
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>name</th>
                </tr>
                </thead>

                <tbody>
                @foreach($categories as $category)
                  <tr>
                      <td>{{$category['id']}}</td>
                      <td>{{$category['name']}}</td>
                  </tr>
                @endforeach

                </tbody>
            </table>

        </div>
        <div class="col-md-3 form-spacing-top">
            <h4>new category :</h4>
            <div class="well">
                {!! Form::open(['route'=>'categories.store','method'=>'POST']) !!}
                {{Form::label('category','Category :')}}
                {{Form::text('name',null,['class'=>'form-control'])}}
                {{Form::submit('Submit',['class'=>'btn btn-info btn-block  btn-h1-spacing'])}}
                {!! Form::close() !!}
            </div>
        </div>
    </div>



    @endsection