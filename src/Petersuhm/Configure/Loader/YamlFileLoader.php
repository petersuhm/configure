<?php

namespace Petersuhm\Configure\Loader;

use Symfony\Component\Yaml\Yaml;

/**
 * Yaml configuration file loader
 *
 * @package Petersuhm.Configure
 */
class YamlFileLoader implements FileLoaderInterface
{
    /**
     * Path to configuration file
     *
     * @var string
     */
    protected $path;

    /**
     * Constructor accepts a file path to a Yaml configuration file
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
        return Yaml::parse($this->getPath());
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
