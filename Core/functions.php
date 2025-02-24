<?php

function root_path($path)
{
    return BASE_PATH . $path;
}
function view($path, $vars = [])
{
    extract($vars);
    require_once root_path('views/' . $path . '.php');
}

function dd($var)
{
    echo "<pre>";
    echo var_dump($var);
    echo "</pre>";
    die();
}

function setSession()
{
    if (!isset($_SESSION)) {
        session_start();
    }
}
