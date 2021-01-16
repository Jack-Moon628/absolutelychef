<?php

namespace Nikolag\Core;

use Nikolag\Core\Exceptions\InvalidConfigurationException;
use Nikolag\Core\Traits\Arrayable;
use Nikolag\Core\Traits\Jsonable;

class CoreConfig
{
    use Arrayable, Jsonable;

    /**
     * @var array
     */
    protected $config;

    /**
     * CoreConfig constructor.
     *
     * @throws InvalidConfigurationException
     */
    public function __construct()
    {
        $this->config = config('nikolag');
        $this->checkConfigValidity($this->config);
    }

    /**
     * Check validity of configuration file.
     *
     * @param mixed $config
     *
     * @throws InvalidConfigurationException if the config provided is empty or not
     *                                       complete
     *
     * @return void
     */
    final public function checkConfigValidity($config)
    {
        if (empty($config) || !isset($config)) {
            throw new InvalidConfigurationException(
                'Configuration file is missing or not complete',
                500
            );
        }
    }
}
