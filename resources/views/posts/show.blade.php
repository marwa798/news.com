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

            {{--<div class="comments">--}}
                {{--@foreach($post->comments as $comment)--}}
                    {{--<p>{{$comment->body}}</p>--}}
                {{--@endforeach--}}
            {{--</div>--}}

            {{--write comment--}}
            <form action={{"/news/" . $post->id . "/comment"}} method="post">
                @csrf
                @method('put')

                <div class="form-group">
                    <input type="comment" name="title" id="comment" class="form-control" placeholder="write comment ..">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Add Comment</button>
                </div>
            </form>
        </div>
    </div>


    @endsection