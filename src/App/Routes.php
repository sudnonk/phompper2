<?php

namespace Sudnonk\Phompper2\App;

use Laminas\Diactoros\ServerRequest as Request;
use Laminas\Diactoros\Response;
use Slim\App;

class Routes
{
    public static function setRoutes(App $app): App
    {
        $app->get('/', function (Request $request, Response $response) {
            $response->getBody()->write('Hello World');
            return $response;
        });
        return $app;
    }
}