@extends('layouts.app')

@section('title')
    Edit Profile
@endsection

@section('content')
    <div class="col-md-9 offset-md-2">
        <br>
        <h3> Edit Profile </h3>
        <hr>

        <form action={{url('/profile/update')}} method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="title">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{$user->name}}">
            </div>

            <div class="form-group">
                <label for="title">Email</label>
                <input type="text" name="email" id="email" class="form-control" value="{{$user->email}}">
            </div>


            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
        <a href="{{url('/profile/changePassword')}}" class="btn btn-primary">Change Password</a>
    </div>
@endsection