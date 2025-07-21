<?php

use Monolog\Level;

return [
    'displayErrors'=>true,
    'logErrors'=>true,
    'logErrorDetails'=>true,
    'logger'=>[
        'name'=>'app',
        'path'=>__DIR__.'/../logs/app.log',
        'level'=> Level::Debug
    ]
];