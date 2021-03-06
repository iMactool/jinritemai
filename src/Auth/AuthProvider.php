<?php

/*
 * Author: cc
 *  Created by PhpStorm.
 *  Copyright (c)  cc Inc. All rights reserved.
 */

namespace Imactool\Jinritemai\Auth;

use Imactool\Jinritemai\Core\Container;
use Imactool\Jinritemai\Interfaces\Provider;

class AuthProvider implements Provider
{
    public function serviceProvider(Container $container)
    {
        $container['Auth'] = function ($container) {
            return new Auth($container);
        };
    }
}
