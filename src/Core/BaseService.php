<?php

/*
 * Author: cc
 *  Created by PhpStorm.
 *  Copyright (c)  cc Inc. All rights reserved.
 */

namespace Imactool\Jinritemai\Core;

use Imactool\Jinritemai\Http\Client;

class BaseService
{
    use Client;

    protected $app;

    public $appRunConfig = [];

    public function __construct(Container $app)
    {
        $this->app = $app;
        if (property_exists($app, 'shopId')) {
            $config['shopId'] = $app->shopId;
            $config['refreshToken'] = $app->refreshToken;
            self::setAppConfig('shop', $config);
        }
        $this->appRunConfig = self::getAppConfig();
    }
}
