<?php

namespace Petersuhm\Configure\Loader;

use Petersuhm\Configure\Exception\FileNotFoundException;

class BaseFileLoader implements FileLoaderInterface
{
    protected $path;

    /**
     * Constructor accepts a file path to a configuration file
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
        // ...
    }

    /**
     * Getter for the path of the configuration file
     *
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Setter for the path of the configuration file
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
