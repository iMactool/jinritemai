<?php

/*
 * * Author: cc
 *  * Created by PhpStorm.
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
