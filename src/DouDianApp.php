<?php
/**
 * ======================================================
 * Author: cc
 * Created by PhpStorm.
 * Copyright (c)  cc Inc. All rights reserved.
 * Desc: 代码功能描述
 *  ======================================================
 */
namespace Imactool\Jinritemai;

use Imactool\Jinritemai\AfterSale\AfterSaleProvider;
use Imactool\Jinritemai\Comment\CommnetProvider;
use Imactool\Jinritemai\Core\ContainerBase;
use Imactool\Jinritemai\Http\Client;
use Imactool\Jinritemai\Auth\AuthProvider;
use Imactool\Jinritemai\Insurance\InsuranceProvider;
use Imactool\Jinritemai\Logistics\LogisticsProvider;
use Imactool\Jinritemai\Message\MessageProvider;
use Imactool\Jinritemai\Order\OrderProvider;
use Imactool\Jinritemai\Product\ProductProvider;
use Imactool\Jinritemai\Shop\ShopProvider;
use Imactool\Jinritemai\Stock\StockProvider;


class DouDianApp extends ContainerBase
{
    private $config;

    use Client;

    /**
     * 配置服务提供者
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
        MessageProvider::class,
    ];

    public function __construct(array $config)
    {
        $this->config = $config;
        Client::setAppConfig($config);
        parent::__construct($config);
    }


}
