<?php

namespace Sudnonk\Phompper2\App;

use Slim\App;
use Slim\Handlers\ErrorHandler;

class Middleware
{
    public static function setMiddleware(App $app, array $config = []): App
    {
        $app->addRoutingMiddleware();
        $app->addBodyParsingMiddleware();
        $app = self::setErrorMiddleware($app, $config);

        return $app;
    }

    protected static function setErrorMiddleware(App $app, array $config = []): App
    {
        $errorHandler = new ErrorHandler($app->getCallableResolver(), $app->getResponseFactory());

        $errorMiddleware = $app->addErrorMiddleware(
            $config['displayErrors'] ?? false,
            $config['logErrors'] ?? false,
            $config['logErrorDetails'] ?? false,
        );
        $errorMiddleware->setDefaultErrorHandler($errorHandler);

        return $app;
    }
}