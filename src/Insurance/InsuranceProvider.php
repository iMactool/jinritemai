<?php

/*
 * Author: cc
 *  Created by PhpStorm.
 *  Copyright (c)  cc Inc. All rights reserved.
 */

namespace Imactool\Jinritemai\Insurance;

use Imactool\Jinritemai\Core\Container;
use Imactool\Jinritemai\Interfaces\Provider;

class InsuranceProvider implements Provider
{
    public function serviceProvider(Container $container)
    {
        $container['Insurance'] = function ($container) {
            return new Insurance($container);
        };
    }
}
