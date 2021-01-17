<?php

namespace Nikolag\Core\Abstracts;

use Nikolag\Core\Traits\Arrayable;
use Nikolag\Core\Traits\Jsonable;

abstract class CorePaymentService
{
    use Arrayable;
    use Jsonable;

    /**
     * @var mixed
     */
    protected $customer;
    /**
     * @var mixed
     */
    protected $merchant;
    /**
     * @var mixed
     */
    protected $order;
    /**
     * @var array
     */
    protected $config;

    /**
     * @return mixed
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * @param mixed $customer
     *
     * @return self
     */
    public function setCustomer($customer)
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getMerchant()
    {
        return $this->merchant;
    }

    /**
     * @param mixed $merchant
     *
     * @return self
     */
    public function setMerchant($merchant)
    {
        $this->merchant = $merchant;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * @return array
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * @param array $config
     *
     * @return self
     */
    public function setConfig(array $config)
    {
        $this->config = $config;

        return $this;
    }
}
