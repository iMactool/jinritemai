<?php
/**
 * ======================================================
 * Author: cc
 * Created by PhpStorm.
 * Copyright (c)  cc Inc. All rights reserved.
 * Desc: 代码功能描述
 *  ======================================================
 */
namespace Imactool\Jinritemai\AfterSale;

use Imactool\Jinritemai\Core\Container;
use Imactool\Jinritemai\Interfaces\Provider;

class AfterSaleProvider implements Provider
{
    public function serviceProvider(Container $container)
    {
         $container['AfterSale'] = function ($container){
             return new AfterSale($container);
         };
    }
}