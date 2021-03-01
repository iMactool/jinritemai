<?php
/**
 * ======================================================
 * Author: cc
 * Created by PhpStorm.
 * Copyright (c)  cc Inc. All rights reserved.
 * Desc: 代码功能描述
 *  ======================================================
 */
namespace Imactool\Jinritemai\Logistics;

use Imactool\Jinritemai\Core\Container;
use Imactool\Jinritemai\Interfaces\Provider;

class LogisticsProvider implements Provider
{
    public function serviceProvider(Container $container)
    {
        $container['Logistics'] = function ($container){
            return new Logistics($container);
        };
    }
}