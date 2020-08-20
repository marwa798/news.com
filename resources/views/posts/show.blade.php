@extends('layouts.app')

@section('title')
    view
@endsection

@section('content')

    <div class="col-lg-4">
        <div class="card">
            {{--<img class="card-img-top img-fluid" src="{{getImage($pic->image)}}" alt="Card image cap">--}}
            <div class="card-body">
                <h4 class="card-title mt-0">{{$post->title}}</h4>
                <hr>
                <img src="{{getImage($post->image)}}" class="img-fluid" alt="image">
                <p class="card-text">{{$post->content}}</p>
                <p class="card-text">
                    <small class="text-muted">{{$post->created_at}}</small>
                </p>
                <p>created by: {{$post->user->name}}</p>
                @auth
                    @if(auth()->user()->id == $post->user_id)
                        <a href="{{"/news/" . $post->id . "/edit"}}" class="btn btn-primary">Edit</a>
                        <a href="{{"/news/" . $post->id . "/delete"}}" class="btn btn-danger" >Delete</a>
                    @endif
                @endauth
                <hr>
            </div>

            {{--show comments--}}

            <div class="comments">
                @foreach($post->comments as $comment)
                    <p>{{$comment->body}}</p>
                @endforeach
            </div>

            @auth
            {{--write comment--}}
            <form action={{"/news/" . $post->id . "/comment"}} method="POST">
                @csrf

                <div class="form-group">
                    <textarea  name="body" id="body" class="form-control" placeholder="write comment .."></textarea>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Add Comment</button>
                </div>
            </form>
                @endauth
        </div>
    </div>


    @endsection