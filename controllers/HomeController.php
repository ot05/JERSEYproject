<?php

class HomeController
{
    public function index()
    {
        view('home.view');
    }
    public function notfound()
    {
        view('errors/404');
        exit();
    }
}
