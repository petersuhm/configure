<?php

namespace Petersuhm\Configure\Loader;

use Petersuhm\Configure\Exception\FileNotFoundException;

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
        $this->setPath($path);
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

    /**
     * Setter for the path of the array configuration file
     *
     * @param $path string
     */
    public function setPath($path)
    {
        if (!is_file($path))
            throw new FileNotFoundException;

        $this->path = $path;
    }
}
