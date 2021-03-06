<?php

require 'vendor/autoload.php';
require 'core/bootstrap.php';

use App\Core\{Request, Router};

Router::load('routes/web.php')
        ->direct(Request::uri(), Request::method());
