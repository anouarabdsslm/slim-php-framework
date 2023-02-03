<?php

namespace App\Controllers;

use App\Core\Application;

class HomeController
{
    public function index()
    {
        $tasks =  Application::get('queryBuilder')->selectAll("tasks");
        return view('index', compact('tasks'));
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }
}
