<?php

$router->get('/', 'HomeController@index');
$router->get('/about', 'HomeController@about');
$router->get('/contact', 'HomeController@contact');
$router->post('/tasks', 'TasksController@store');
