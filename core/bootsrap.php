<?php

use App\Core\Application;

require "core/helpers.php";
Application::bind('config', require "config.php");

Application::bind(
    'queryBuilder',
    new QueryBuilder(
        Connection::make(Application::get('config')['database'])
    )
);
