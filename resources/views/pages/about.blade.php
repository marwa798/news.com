@extends('layouts.app')

@section('title')
        {{$title ?? ' '}}
    @endsection

@section('content')
    <p>About page</p>
    <ul>
    @foreach($data as $item=>$value)
       <li>{{$item}} : {{$value}}</li>
    @endforeach
    </ul>
    @endsection