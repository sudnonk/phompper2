<?php
declare(strict_types=1);

use DI\ContainerBuilder;
use Psr\Log\LoggerInterface;
use Slim\Factory\AppFactory;
use Sudnonk\Phompper2\App\Logger;
use Sudnonk\Phompper2\App\Middleware;
use Sudnonk\Phompper2\App\Routes;

require __DIR__ . '/../vendor/autoload.php';
$config = require __DIR__ . '/../config/config.php';

$containerBuilder = new ContainerBuilder();
$containerBuilder = Logger::setLogger($containerBuilder);
$container = $containerBuilder->build();
AppFactory::setContainer($container);

$logger = $container->get(LoggerInterface::class);

$app = AppFactory::create();
$app = Routes::setRoutes($app);
$app = Middleware::setMiddleware($app, $config);

$app->run();