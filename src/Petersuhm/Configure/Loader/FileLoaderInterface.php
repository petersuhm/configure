<?php

namespace Petersuhm\Configure\Loader;

/**
 * Interface for configuration file loaders
 *
 * @package Petersuhm.Configure
 */
interface FileLoaderInterface
{
    /**
     * Constructor accepts a file path to a configuration file
     *
     * @param $path string
     */
    public function __construct($path);

    /**
     * Return configuration values in array format
     *
     * @return array
     */
    public function asArray();

    /**
     * Getter for the path of the configuration file
     *
     * @return string
     */
    public function getPath();

    /**
     * Setter for the path of the configuration file
     *
     * @param $path string
     */
    public function setPath($path);
}