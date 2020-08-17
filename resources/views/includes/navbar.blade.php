<!DOCTYPE html>
<html lang="en">
<head>
    <title>CSS Website Layout</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
        }

        /* Style the header */
        .header {
            background-color: #f1f1f1;
            padding: 20px;
            text-align: center;
        }

        /* Style the top navigation bar */
        .topnav {
            overflow: hidden;
            background-color: #333;
        }

        /* Style the topnav links */
        .topnav a {
            float: left;
            display: block;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        /* Change color on hover */
        .topnav a:hover {
            background-color: #ddd;
            color: black;
        }
    </style>
</head>
<body>


<div class="topnav">
    <a href="{{url('/')}}">News.com</a>
    <a href="{{url('/news')}}">News</a>
    <a href="{{url('/news/create')}}">Add New</a>
    <a href="{{url('/profile')}}">Profile</a>
    <a href="{{url('/about')}}">About</a>
</div>

</body>
</html>
