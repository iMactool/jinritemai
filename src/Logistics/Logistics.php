<?php
/**
 * ======================================================
 * Author: cc
 * Created by PhpStorm.
 * Copyright (c)  cc Inc. All rights reserved.
 * Desc: 代码功能描述
 *  ======================================================
 */
namespace Imactool\Jinritemai\Logistics;

use Imactool\Jinritemai\Core\BaseService;

class Logistics extends BaseService
{


    //获取区列表 areaList()
     public function  areaList(array $params)
     {
         return $this->post('address/areaList',$params);
     }

    //获取市列表 cityList()
     public function  cityList(array $params)
     {
         return $this->post('address/cityList',$params);
     }

    //获取省列表 provinceList()
     public function  provinceList()
     {
        return  $this->post('address/provinceList');
     }

    //订单发货 sendOrderLogistics()
     public function  sendOrderLogistics(array $params)
     {
         return $this->post('order/logisticsAdd',$params);
     }

    //一个父订单可发多个物流包裹 sendOrderLogisticsMultiPack()
     public function  sendOrderLogisticsMultiPack(array $params)
     {
         return $this->post('order/logisticsAddMultiPack',$params);
     }

    //支持多个子订单发同一个物流包裹 sendOrderLogisticsSinglePack()
     public function  sendOrderLogisticsSinglePack(array $params)
     {
         return $this->post('order/logisticsAddSinglePack',$params);
     }

    //获取快递公司列表 logisticsCompanyList()
     public function  logisticsCompanyList()
     {
         return $this->post('order/logisticsCompanyList');
     }

     //修改发货物流  editLogisticsEdit()
     public function editLogisticsEdit(array $params)
     {
         return $this->post('order/logisticsEdit',$params);
     }

    //修改包裹里的物流信息 editLogisticsByPack()
     public function  editLogisticsByPack(array $params)
     {
         return $this->post('order/logisticsEditByPack',$params);
     }
}