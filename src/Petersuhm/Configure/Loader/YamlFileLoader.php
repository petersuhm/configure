<?php

namespace Petersuhm\Configure\Loader;

use Symfony\Component\Yaml\Yaml;

/**
 * Yaml configuration file loader
 *
 * @package Petersuhm.Configure
 */
class YamlFileLoader extends BaseFileLoader
{
    /**
     * Return configuration values in array format
     *
     * @return array
     */
    public function asArray()
    {
        return Yaml::parse($this->getPath());
    }
}
