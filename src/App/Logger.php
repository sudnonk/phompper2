<?php

namespace Sudnonk\Phompper2\App;

use DI\ContainerBuilder;
use Monolog\Handler\RotatingFileHandler;
use Monolog\Level;
use Monolog\Processor\IntrospectionProcessor;
use Monolog\Processor\WebProcessor;
use Psr\Log\LoggerInterface;

class Logger
{
    public static function setLogger(ContainerBuilder $container, array $config = []): ContainerBuilder
    {
        $container->addDefinitions([
            LoggerInterface::class => function () use ($config): LoggerInterface {
                $logger = new \Monolog\Logger($config['logger']['name'] ?? 'app');

                $logger->pushProcessor(new IntrospectionProcessor());
                $logger->pushProcessor(new WebProcessor());

                $handler = new RotatingFileHandler(
                    $config['logger']['path'] ?? __DIR__ . "/../../logs/app.log",
                    0,
                    $config['logger']['level'] ?? Level::Debug
                );
                $logger->pushHandler($handler);

                return $logger;
            }
        ]);
        return $container;
    }
}