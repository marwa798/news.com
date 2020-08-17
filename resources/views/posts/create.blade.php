@extends('layouts.app')

@section('title')
    Add New Post
    @endsection

@section('content')
    <div class="col-md-9 offset-md-2">
        <br>
        <h3> Add New Post </h3>
        <hr>

        <form action="/news/store" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control">
            </div>

            <div class="form-group">
                <label for="content">Content</label>
                <textarea type="text" name="content" id="content" cols="30" rows="4" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <input type="file" name="image" id="image" class="form-control-file">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Share</button>
            </div>
        </form>
    </div>
    @endsection