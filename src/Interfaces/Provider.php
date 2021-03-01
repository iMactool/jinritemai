<?php

/*
 * Author: cc
 *  Created by PhpStorm.
 *  Copyright (c)  cc Inc. All rights reserved.
 */

namespace Imactool\Jinritemai\Interfaces;

use Imactool\Jinritemai\Core\Container;

interface Provider
{
    /**
     * @return mixed
     */
    public function serviceProvider(Container $container);
}
