<?php

namespace Petersuhm\Configure;

use Petersuhm\Configure\Exception\InvalidKeyException;
use Petersuhm\Configure\Loader\FileLoaderInterface;

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
     * Add configuration(s) to repository
     *
     * If given a multi dimensional array, it will flatten it using dot notation
     *
     * @param $key array|string
     *
     * @param $value string (optional)
     */
    public function set($key, $value = null)
    {
        if (is_array($key)) {
            $key = $this->flattenArray($key);
            $this->settings = array_merge($this->settings, $key);
        } else {
            $this->settings[$key] = $value;
        }
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

    /**
     * Load configuration values from a file loader instance
     *
     * @param $loader FileLoaderInterface
     */
    public function load(FileLoaderInterface $loader)
    {
        $this->set($loader->asArray());
    }

    /**
     * Flatten array using dot notation
     *
     * Credits: Taylor Otwell and Laravel Framework:
     *  http://laravel.com/api/source-function-array_dot.html#85-109
     *
     * @param array $array
     *
     * @param string $prepend (optional)
     *
     * @return array
     */
    protected function flattenArray($array, $prepend = '')
    {
        $results = array();

        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $results = array_merge($results, $this->flattenArray($value, $prepend.$key.'.'));
            } else {
                $results[$prepend.$key] = $value;
            }
        }

        return $results;
    }
}
