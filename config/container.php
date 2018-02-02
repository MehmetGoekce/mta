<?php
declare(strict_types=1);

use Symfony\Component\Dotenv\Dotenv;
use Zend\ServiceManager\ServiceManager;

chdir(dirname(__DIR__));

require __DIR__ . '/../vendor/autoload.php';

if(class_exists(Dotenv::class)) {
    $dotenv = new Dotenv();
    $dotenv->load(__DIR__ . '/../.env');
}

return(function(){
    $config = include __DIR__ . '/config.php';
    $servicemanager = new ServiceManager($config['dependencies'] ?? []);
    $servicemanager->setService('config', $config);
    return $servicemanager;
})();
    

