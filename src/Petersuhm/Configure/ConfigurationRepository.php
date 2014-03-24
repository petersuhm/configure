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
     * Accepts a default value to be returned if 'key' isn't set
     *
     * @param $key string
     *
     * @param $default string (optional)
     *
     * @throws InvalidKeyException if the provided key doesn't exist and no
     *  default value is given
     *
     * @return string
     */
    public function get($key, $default = null)
    {
        if (!array_key_exists($key, $this->settings)) {

            if (is_null($default)) {
                throw new InvalidKeyException();
            }

            return $default;
        }

        return $this->settings[$key];
    }
}
