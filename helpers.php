<?php

if (!function_exists('blog_asset')) {
    function blog_asset($url, array $attributes = [], $secure = false)
    {
        return Module::asset('blog', $url, $attributes, $secure);
    }
}