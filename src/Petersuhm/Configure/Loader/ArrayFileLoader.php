<?php

namespace Petersuhm\Configure\Loader;

/**
 * PHP array configuration file loader
 *
 * @package Petersuhm.Configure
 */
class ArrayFileLoader implements FileLoaderInterface
{
    /**
     * Path to configuration file
     *
     * @var string
     */
    protected $path;

    /**
     * Constructor accepts a file path to a PHP configuration file
     *
     * @param $path string
     */
    public function __construct($path)
    {
        $this->path = $path;
    }

    /**
     * Return configuration values in array format
     *
     * @return array
     */
    public function asArray()
    {
        return include $this->path;
    }

    /**
     * Getter for the loader's file path
     *
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }
}
