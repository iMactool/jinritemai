<?php

/*
 * Author: cc
 *  Created by PhpStorm.
 *  Copyright (c)  cc Inc. All rights reserved.
 */

namespace Imactool\Jinritemai;

use Imactool\Jinritemai\AfterSale\AfterSaleProvider;
use Imactool\Jinritemai\Bill\BillProvider;
use Imactool\Jinritemai\Btas\BtasProvider;
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
    private static $config;
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
        BillProvider::class,
        BtasProvider::class
    ];

    public function __construct(array $config)
    {
        self::$config = $config;
        Client::setAppConfig('config', $config);
        parent::__construct();
    }

    public function shopApp(int $shopId, string $refreshToken)
    {
        parent::__construct();
        $this->shopId = $shopId;
        $this->refreshToken = $refreshToken;

        return $this;
    }
}
