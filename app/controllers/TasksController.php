<?php

namespace App\Controllers;

use App\Core\Application;

class TasksController
{
    public function store()
    {
        Application::get('queryBuilder')->insert('tasks', [
            'description' => $_POST['description'],
            'completed' => 0,
        ]);

        redirect('/');
    }
}
