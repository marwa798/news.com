<?php

if (!function_exists('getImage'))
{
    function getImage($image , $default = 'placeholder.PNG')
    {
        if (!$image || file_exists(storage_path('storage/postsImages/'.$image)))
        {
            return asset('storage/postsImages/'.$default);
        }

        return asset('storage/postsImages/'.$image);

    }
}