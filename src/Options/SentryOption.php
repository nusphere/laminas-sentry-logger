<?php

namespace NuSphere\Laminas\Sentry\Logger\Options;

use InvalidArgumentException;
use Laminas\Stdlib\AbstractOptions;

final class SentryOption extends AbstractOptions
{
    private string $dns = 'https://<your-dsn>@sentry.io/<project-id>';
    private string $environment = 'production';
    private int $errorTypes = E_ALL;

    private $validErrorLevels = [
        E_ERROR,
        E_WARNING,
        E_PARSE,
        E_NOTICE,
        E_CORE_ERROR,
        E_CORE_WARNING,
        E_COMPILE_ERROR,
        E_COMPILE_WARNING,
        E_USER_ERROR,
        E_USER_WARNING,
        E_USER_NOTICE,
        E_STRICT,
        E_RECOVERABLE_ERROR,
        E_DEPRECATED,
        E_USER_DEPRECATED
    ];

    public function getDns(): string
    {
        return $this->dns;
    }
    public function setDns(string $dns): void
    {
        $this->dns = $dns;
    }

    public function getEnvironment(): string
    {
        return $this->environment;
    }
    public function setEnvironment(string $environment): void
    {
        $this->environment = $environment;
    }

    public function getErrorTypes(): int
    {
        return $this->errorTypes;
    }
    public function setErrorTypes(int $errorTypes): void
    {
        if (!$this->isValidErrorLevel($errorTypes)) {
            throw new InvalidArgumentException('Invalid error level');
        }

        $this->errorTypes = $errorTypes;
    }

    function isValidErrorLevel(int $level): bool
    {
        $allValidBits = 0;
        foreach ($this->validErrorLevels as $level) {
            $allValidBits |= $level;
        }

        return ($level & ~$allValidBits) === 0;
    }
}
