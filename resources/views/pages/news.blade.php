@extends('layouts.app')

@section('title')
    new feeds
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="buttons-group">
                        </div>
                        <div class="row">
                            @foreach($posts as $post)

                                <div class="col-lg-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title mt-0">{{$post->title}}</h4>
                                            <hr>
                                            <img src="{{getImage($post->image)}}" class="img-fluid" alt="image">
                                            <p class="card-text">{{$post->content}}</p>
                                            <p class="card-text">
                                                <small class="text-muted">{{$post->created_at}}</small>
                                            </p>
                                            <p>created by: {{$post->user->name}}</p>
                                            <a href="{{'/news/' . $post->id}}" class="btn btn-primary">Show more</a>
                                            <hr>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>


                    </div>
                </div>
            </div> <!-- end col -->
        </div>
        <div class="col">
            <div class="col-md-12 d-flex justify-content-center">
                {{$posts->links()}}
            </div>
        </div>
    </div>
@endsection