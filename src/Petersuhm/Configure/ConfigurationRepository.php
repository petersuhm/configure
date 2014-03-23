<?php

namespace Petersuhm\Configure;

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
}
