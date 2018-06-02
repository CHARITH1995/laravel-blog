@extends('main')
@section('title','|Aboutpage')
@section('content')

    <row>
        <div class="col-md-12">
            <h1>About me</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. At culpa deserunt, inventore nihil nisi quia quisquam q
                uos? Culpa eos, error ex nisi reiciendis sunt totam vel voluptas? Alias, beatae incidunt.</p>
            <br>
            <p>{{$data['fullname']}}</p>
            <br>
            <p>{{$data['email']}}</p>
        </div>
    </row>
@endsection


