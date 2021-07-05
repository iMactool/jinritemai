<?php

/*
 * Author: cc
 *  Created by PhpStorm.
 *  Copyright (c)  cc Inc. All rights reserved.
 */

namespace Imactool\Jinritemai\Logistics;

use Imactool\Jinritemai\Core\BaseService;
use phpDocumentor\Reflection\Types\Integer;

class Logistics extends BaseService
{
    //获取区列表 areaList()
    public function areaList(array $params)
    {
        return $this->post('address/areaList', $params);
    }

    //获取市列表 cityList()
    public function cityList(array $params)
    {
        return $this->post('address/cityList', $params);
    }

    //获取省列表 provinceList()
    public function provinceList()
    {
        return $this->post('address/provinceList');
    }

    //订单发货 sendOrderLogistics()
    public function sendOrderLogistics(array $params)
    {
        return $this->post('order/logisticsAdd', $params);
    }

    //一个父订单可发多个物流包裹 sendOrderLogisticsMultiPack()
    public function sendOrderLogisticsMultiPack(array $params)
    {
        return $this->post('order/logisticsAddMultiPack', $params);
    }

    //支持多个子订单发同一个物流包裹 sendOrderLogisticsSinglePack()
    public function sendOrderLogisticsSinglePack(array $params)
    {
        return $this->post('order/logisticsAddSinglePack', $params);
    }

    //获取快递公司列表 logisticsCompanyList()
    public function logisticsCompanyList()
    {
        return $this->post('order/logisticsCompanyList');
    }

    //修改发货物流  editLogisticsEdit()
    public function editLogisticsEdit(array $params)
    {
        return $this->post('order/logisticsEdit', $params);
    }

    //修改包裹里的物流信息 editLogisticsByPack()
    public function editLogisticsByPack(array $params)
    {
        return $this->post('order/logisticsEditByPack', $params);
    }

    //查询商家和物流商的订购关系以及物流单号使用情况
    public function listShopNetsite(string $logistics_code)
    {
        $params['logistics_code'] = $logistics_code;
        return $this->post('logistics/listShopNetsite', $params);
    }

    /**
     * 查询地址快递是否可以送达
     *
     */
    public function getOutRange(array $params)
    {
        return $this->post('logistics/getOutRange', $params);
    }

    /**
     * 根据省获取全量四级地址
     * @param Number $province_id
     */
    public function getAreasByProvince(Integer $province_id)
    {
        $params['province_id'] = $province_id;
        return $this->post('address/getAreasByProvince', $params);
    }

    /**
     * 获取四级地址全量省份信息
     */
    public function getProvince(array $params)
    {
        return $this->post('address/getProvince', $params);
    }

    /**
     * 商家ERP/ISV 向字节电子面单系统获取单号和打印信息
     * @param array $params
     * @return mixed
     */
    public function newCreateOrder(array $params)
    {
        return $this->post('logistics/newCreateOrdere', $params);
    }
}
