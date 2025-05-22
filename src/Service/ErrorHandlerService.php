<?php

namespace NuSphere\Laminas\Sentry\Logger\Service;

use NuSphere\Laminas\Sentry\Logger\Options\SentryOption;

class ErrorHandlerService
{
    public function __construct(private readonly SentryOption $sentryOption)
    {
    }

    public function init()
    {
        \Sentry\init([
            'dsn' => $this->sentryOption->getDns(),
            'environment' => $this->sentryOption->getEnvironment(),
            'error_types' => $this->sentryOption->getErrorTypes(), // Alles mitschneiden
        ]);
    }


}
