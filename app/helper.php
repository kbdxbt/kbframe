<?php

if (! function_exists('user')) {

    function user()
    {
        return Auth::user();
    }

}

if (! function_exists('per_page')) {

    function per_page()
    {
        return request()->get('limit', 15);
    }

}

