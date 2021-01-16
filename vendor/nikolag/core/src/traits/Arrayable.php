<?php

namespace Nikolag\Core\Traits;

trait Arrayable
{
    /**
     * Returns config as array.
     *
     * @return object
     */
    public function getConfigAsArray()
    {
        return (object) $this->config;
    }
}
