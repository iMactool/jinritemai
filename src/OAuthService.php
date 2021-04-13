<?php

/*
 * Author: cc
 *  Created by PhpStorm.
 *  Copyright (c)  cc Inc. All rights reserved.
 */

namespace Imactool\Jinritemai;

use Imactool\Jinritemai\Core\ContainerBase;
use Imactool\Jinritemai\Http\Client;
use Imactool\Jinritemai\Auth\AuthProvider;

class OAuthService extends ContainerBase
{

    use Client;

    /**
     * 配置服务提供者.
     *
     * @var string[]
     */
    protected $provider = [
        AuthProvider::class,
    ];

    public function __construct(array $config)
    {
        Client::setAppConfig($config);
        parent::__construct();
    }
}
