<?php

namespace App\Controllers;

use TestTask\View\View;

class HomeController
{
    public function index()
    {
        return View::make('home');
    }
}