<?php

namespace Petersuhm\Configure;

use Petersuhm\Configure\Exception\InvalidKeyException;

/**
 * Class representing a configuration repository
 *
 * @package Petersuhm.Configure
 */
class ConfigurationRepository implements \IteratorAggregate
{
    /**
     * All configurations added to the repository
     *
     * @var array
     */
    protected $settings = array();

    /**
     * Get the repository iterator
     *
     * @return \ArrayIterator
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->settings);
    }

    /**
     * Add configuration to repository
     *
     * @param $key string
     *
     * @param $value string
     */
    public function set($key, $value)
    {
        $this->settings[$key] = $value;
    }

    /**
     * Get configuration from repository
     *
     * @param $key string
     *
     * @return string
     */
    public function get($key)
    {
        if (!array_key_exists($key, $this->settings)) {
            throw new InvalidKeyException();
        }

        return $this->settings[$key];
    }
}
