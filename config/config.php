<?php
declare(strict_types=1);

namespace Mt;

use Zend\ConfigAggregator;
use AcMailer;

return (new ConfigAggregator\ConfigAggregator([
    AcMailer\ConfigProvider::class,
    new ConfigAggregator\PhpFileProvider(__DIR__ . '/autoload/{{,*.}global,{,*.}local}.php'),
    ], __DIR__ . '/../data/cache/config_cache.php'))->getMergedConfig();

