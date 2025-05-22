<?php

declare(strict_types=1);

namespace NuSphere\Laminas\Sentry\Logger;

use Laminas\ModuleManager\Feature\ConfigProviderInterface;

class Module implements ConfigProviderInterface
{
    final public function getConfig(): array
    {
        return include __DIR__ . '/../config/module.config.php';
    }
}
