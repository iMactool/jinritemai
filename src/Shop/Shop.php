<?php

/*
 * * Author: cc
 *  * Created by PhpStorm.
 */

namespace Imactool\Jinritemai\Shop;

use Imactool\Jinritemai\Core\BaseService;
use Imactool\Jinritemai\Exceptions\InvalidArgumentException;

/**
 * 店铺 API
 * Class Shop.
 */
class Shop extends BaseService
{
    /**
     * 获取店铺的已授权品牌列表.
     *
     * @return mixed
     */
    public function getShopBrandList()
    {
        return $this->post('shop/brandList');
    }

    /**
     * 获取店铺后台供商家发布商品的类目.
     *
     * @param string $cid 父类目id，根据父id可以获取子类目，一级类目cid=0
     *
     * @return mixed
     */
    public function getShopCategory($params)
    {
        if (!is_numeric($params['cid'])) {
            throw new InvalidArgumentException('Invalid params!');
        } elseif (is_int($params['cid'])) {
            //兼容 1 和 '1' 写法
            $params['cid'] = (string) $params['cid'];
        }

        return $this->post('shop/getShopCategory', $params);
    }
}
