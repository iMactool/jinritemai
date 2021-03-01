<?php

/*
 * Author: cc
 *  Created by PhpStorm.
 *  Copyright (c)  cc Inc. All rights reserved.
 */

namespace Imactool\Jinritemai\Comment;

use Imactool\Jinritemai\Core\Container;
use Imactool\Jinritemai\Interfaces\Provider;

class CommnetProvider implements Provider
{
    public function serviceProvider(Container $container)
    {
        $container['Commnet'] = function ($container) {
            return new Commnet($container);
        };
    }
}
