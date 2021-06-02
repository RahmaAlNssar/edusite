<?php

// function to return the dashboard files path
function path(string $path)
{
    return asset('assets/backend/' . $path);
} // end of path function

function active($model, $method = null)
{
    $url =  explode('/', request()->path());

    if (in_array($model, $url) && $method === null) {
        return 'active';
    }
    if (in_array($model, $url) && in_array($method, $url)) {
        return 'active';
    }
    if (in_array($model, $url) && end($url) === $model && $method === 'index') {
        return 'active';
    }
    return '';
} // end of active function

// function to return the model name form url
function getModel()
{
    if (request()->segment(1) === 'dashboard' && !empty(request()->segment(2)))
        return request()->segment(2);

    if (request()->segment(2) === 'dashboard' && !empty(request()->segment(3)))
        return request()->segment(3);

    return 'dashboard';
} // end of active function

function getSinglarModel()
{
    return Illuminate\Support\Str::singular(getModel());
}
