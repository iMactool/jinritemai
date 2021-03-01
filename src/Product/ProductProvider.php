<?php

/*
 * * Author: cc
 *  * Created by PhpStorm.
 */

namespace Imactool\Jinritemai\Product;

use Imactool\Jinritemai\Core\Container;
use Imactool\Jinritemai\Interfaces\Provider;

class ProductProvider implements Provider
{
    public function serviceProvider(Container $container)
    {
        $container['Product'] = function ($container) {
            return new Product($container);
        };
    }
}
