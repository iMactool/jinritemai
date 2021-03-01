<?php
/**
 * ======================================================
 * Author: cc
 * Created by PhpStorm.
 * Copyright (c)  cc Inc. All rights reserved.
 * Desc: 代码功能描述
 *  ======================================================
 */
namespace Imactool\Jinritemai\Stock;

use Imactool\Jinritemai\Core\Container;
use Imactool\Jinritemai\Interfaces\Provider;

class StockProvider implements Provider
{
    public function serviceProvider(Container $container)
    {
        $container['Stock'] = function ($container){
            return new Stock($container);
        };
    }
}