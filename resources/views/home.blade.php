@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>


                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

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
                                                            <h3 class="card-title mt-0">{{$post->title}}</h3>
                                                            <hr>
                                                            <img src="{{getImage($post->image)}}" class="img-fluid" alt="image">
                                                            <p class="card-text">{{$post->content}}</p>
                                                            <p class="card-text">
                                                                <small class="text-muted">{{$post->created_at}}</small>
                                                            </p>
                                                            <a href="{{'/news/' . $post->id}}" class="btn btn-primary">Show more</a>
                                                            <hr>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>

                                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
