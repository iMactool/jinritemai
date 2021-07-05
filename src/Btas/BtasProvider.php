<?php

/*
 * Author: cc
 *  Created by PhpStorm.
 *  Copyright (c)  cc Inc. All rights reserved.
 */

namespace Imactool\Jinritemai\Btas;

use Imactool\Jinritemai\Core\Container;
use Imactool\Jinritemai\Interfaces\Provider;

class BtasProvider implements Provider
{
    public function serviceProvider(Container $container)
    {
        $container['Btas'] = function ($container) {
            return new Btas($container);
        };
    }
}
