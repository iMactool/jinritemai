<?php

/*
 * Author: cc
 *  Created by PhpStorm.
 *  Copyright (c)  cc Inc. All rights reserved.
 */

namespace Imactool\Jinritemai\Bill;

use Imactool\Jinritemai\Core\Container;
use Imactool\Jinritemai\Interfaces\Provider;

class BillProvider implements Provider
{
    public function serviceProvider(Container $container)
    {
        $container['Bill'] = function ($container) {
            return new Bill($container);
        };
    }
}
