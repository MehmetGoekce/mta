<?php
declare(strict_types=1);

use Interop\Container\ContainerInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Expressive\Application;

// Error reporting
if (getenv('APP_ENV') == 'dev') {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
}

$container = include __DIR__ . '/../config/container.php';
$app = $container->get(Application::class)->run($container->get(ServerRequestInterface::class));

