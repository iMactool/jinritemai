<?php
/**
 * ======================================================
 * Author: cc
 * Created by PhpStorm.
 * Copyright (c)  cc Inc. All rights reserved.
 * Desc: 代码功能描述
 *  ======================================================
 */
namespace Imactool\Jinritemai\Interfaces;

use Imactool\Jinritemai\Core\Container;

interface Provider
{

    /**
     * @param Container $container
     * @return mixed
     */
    public function serviceProvider(Container $container);

}