<?php
/**
 * ======================================================
 * Author: cc
 * Created by PhpStorm.
 * Copyright (c)  cc Inc. All rights reserved.
 * Desc: 代码功能描述
 *  ======================================================
 */
namespace Imactool\Jinritemai\Order;

use Imactool\Jinritemai\Core\Container;
use Imactool\Jinritemai\Interfaces\Provider;

class OrderProvider implements Provider
{
    public function serviceProvider(Container $container)
    {
        $container['Order'] = function ($container){
            return new Order($container);
        };
    }
}