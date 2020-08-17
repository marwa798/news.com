@extends('layouts.app')

@section('title')
    Edit Post
@endsection

@section('content')
    <div class="col-md-9 offset-md-2">
        <br>
        <h3> Edit Post </h3>
        <hr>

        <form action={{"/news/" . $post->id . "/update"}} method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{$post->title}}">
            </div>
            <div class="card">
                <img class="card-img-top img-fluid" src="{{getImage($post->image)}}" class="img-fluid" alt="Card image cap">
            </div>

            <div class="form-group">
                <label for="content">Content</label>
                <textarea type="text" name="content" id="content" cols="30" rows="4" class="form-control">{{$post->content}}</textarea>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
@endsection