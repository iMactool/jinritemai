<?php

/*
 * Author: cc
 *  Created by PhpStorm.
 *  Copyright (c)  cc Inc. All rights reserved.
 */

namespace Imactool\Jinritemai\Shop;

use Imactool\Jinritemai\Core\Container;
use Imactool\Jinritemai\Interfaces\Provider;

class ShopProvider implements Provider
{
    public function serviceProvider(Container $container)
    {
        $container['Shop'] = function ($container) {
            return new Shop($container);
        };
    }
}
