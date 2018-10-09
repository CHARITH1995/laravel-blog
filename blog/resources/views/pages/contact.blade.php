@extends('main')
@section('title','| Contact Page')
@section('content')

        <div class="col-md-12">
            <h1>Contact me</h1>
            <hr>
            <form class="form-group">
                <div class="form-group">
                    <lable name="email">Email:</lable>
                    <input id="email" name="email" class="form-control">
                </div>
                <div class="form-group">
                    <lable name="sublect">Subject:</lable>
                    <input type="text" id="subject" name="subject" class="form-control">
                </div>
                <div class="form-group">
                    <lable name="message">Message:</lable>
                    <input type="text" id="message" name="message" class="form-control">
                </div>
                <input type="submit" value="send message" class="btn btn-success">
            </form>
        </div>
@endsection