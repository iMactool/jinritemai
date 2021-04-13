<?php

/*
 * Author: cc
 *  Created by PhpStorm.
 *  Copyright (c)  cc Inc. All rights reserved.
 */

namespace Imactool\Jinritemai;

use Imactool\Jinritemai\AfterSale\AfterSaleProvider;
use Imactool\Jinritemai\Comment\CommnetProvider;
use Imactool\Jinritemai\Core\ContainerBase;
use Imactool\Jinritemai\Http\Client;
use Imactool\Jinritemai\Auth\AuthProvider;
use Imactool\Jinritemai\Insurance\InsuranceProvider;
use Imactool\Jinritemai\Logistics\LogisticsProvider;
use Imactool\Jinritemai\Order\OrderProvider;
use Imactool\Jinritemai\Product\ProductProvider;
use Imactool\Jinritemai\Shop\ShopProvider;
use Imactool\Jinritemai\Stock\StockProvider;

class DouDianApp extends ContainerBase
{
    use Client;

    /**
     * 配置服务提供者.
     *
     * @var string[]
     */
    protected $provider = [
        ShopProvider::class,
        AuthProvider::class,
        ProductProvider::class,
        AfterSaleProvider::class,
        CommnetProvider::class,
        InsuranceProvider::class,
        LogisticsProvider::class,
        OrderProvider::class,
        StockProvider::class,
    ];

    public function __construct(int $shopId, string $refreshToken)
    {
        $config['shopId'] = $shopId;
        $config['refreshToken'] = $refreshToken;
        Client::setShopConfig($config);
        parent::__construct();
    }
}
