<?php

require 'vendor/autoload.php';
require 'core/bootstrap.php';


Router::load('routes/web.php')
        ->direct(Request::uri(), Request::method());
