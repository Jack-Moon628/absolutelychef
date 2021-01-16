<?php

namespace Nikolag\Core;

class CoreService extends CoreConfig
{
    /**
     * @var array
     */
    private $drivers;

    public function __construct()
    {
        parent::__construct();
        $this->drivers = $this->getConfigAsJson()->connections;
    }

    /**
     * Returns instance of the specified service.
     *
     * @param string $driver
     *
     * @return \Nikolag\Core\Contracts\PaymentServiceContract
     */
    public function use(string $driver)
    {
        return resolve($this->drivers->{$driver}->namespace);
    }

    /**
     * Returns instance of the default service.
     *
     * @return \Nikolag\Core\Contracts\PaymentServiceContract
     */
    public function default()
    {
        return resolve($this->drivers->{$this->getConfigAsJson()->default}->namespace);
    }

    /**
     * Returns all available drivers
     * which u have installed.
     *
     * @return array
     */
    public function availableDrivers()
    {
        return array_keys($this->drivers);
    }
}
