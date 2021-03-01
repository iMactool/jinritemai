<?php

/*
 * Author: cc
 *  Created by PhpStorm.
 *  Copyright (c)  cc Inc. All rights reserved.
 */

namespace Imactool\Jinritemai\Core;

use Symfony\Component\Cache\Adapter\FilesystemAdapter;

trait CacheAdapter
{
    private static $instance;
    protected $access_token;
    public $tokenKey = 'access_token';
    protected $cachePrefix = 'imactool.core.access_token';

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new FilesystemAdapter();
        }

        return self::$instance;
    }

    protected function getCacheKey($credentials)
    {
        return $this->cachePrefix.md5(json_encode($credentials));
    }
}
