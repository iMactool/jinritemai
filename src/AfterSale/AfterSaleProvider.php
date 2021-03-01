<?php

/*
 * * Author: cc
 *  * Created by PhpStorm.
 */

namespace Imactool\Jinritemai\AfterSale;

use Imactool\Jinritemai\Core\Container;
use Imactool\Jinritemai\Interfaces\Provider;

class AfterSaleProvider implements Provider
{
    public function serviceProvider(Container $container)
    {
        $container['AfterSale'] = function ($container) {
            return new AfterSale($container);
        };
    }
}
