<?php

use App\Core\{Request, Router};

require "vendor/autoload.php";
require "core/bootsrap.php";

Router::load('app/routes/web.php')
        ->direct(Request::uri(), Request::method());
