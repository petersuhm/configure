<?php

namespace Petersuhm\Configure\Loader;

/**
 * PHP array configuration file loader
 *
 * @package Petersuhm.Configure
 */
class ArrayFileLoader extends BaseFileLoader
{
    /**
     * Return configuration values in array format
     *
     * @return array
     */
    public function asArray()
    {
        return include $this->path;
    }
}
