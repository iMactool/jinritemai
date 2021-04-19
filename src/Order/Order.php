<?php

/*
 * Author: cc
 *  Created by PhpStorm.
 *  Copyright (c)  cc Inc. All rights reserved.
 */

namespace Imactool\Jinritemai\Order;

use Imactool\Jinritemai\Core\BaseService;

class Order extends BaseService
{
    //添加订单备注 addOrderRemark()
    public function addOrderRemark(array $params)
    {
        return $this->post('order/addOrderRemark', $params);
    }

    //设置店铺设置地址变更审核 setAddressAppliedSwitch()
    public function setAddressAppliedSwitch(array $params)
    {
        return $this->post('order/AddressAppliedSwitch', $params);
    }

    //买家地址变更确认 addressConfirm()
    public function addressConfirm(array $params)
    {
        return $this->post('order/addressConfirm', $params);
    }

    //买家主动修改收货地址 addressModify()
    public function addressModify(array $params)
    {
        return $this->post('order/addressModify', $params);
    }

    //取消(货到付款)订单 cancelOrder()
    public function cancelOrder(array $params)
    {
        return $this->post('order/cancel', $params);
    }

    //获取订单详情 getOrder() 即将下线
    public function getOrder(array $params)
    {
        return $this->post('order/detail', $params);
    }

    //获取订单详情 getOrderDetail() 新
    public function getOrderDetail(array $params)
    {
        return $this->post('order/orderDetail', $params);
    }

    //获取服务单列表 getServiceOrderList()
    public function getServiceOrderList(array $params)
    {
        return $this->post('order/getServiceList', $params);
    }

    //获取订单列 getOrderList() 即将下线
    public function getOrderList(array $params)
    {
        return $this->post('order/list', $params);
    }

    //获取订单列 getOrderList() 新
    public function getOrderSearchList(array $params)
    {
        return $this->post('order/searchList', $params);
    }

    //回复服务请求 replyService()
    public function replyService(array $params)
    {
        return $this->post('order/replyService', $params);
    }

    //查询商家服务单详情请求 serviceDetail()
    public function serviceDetail(array $params)
    {
        return $this->post('order/serviceDetail', $params);
    }

    //获取服务请求列表 serviceList()
    public function serviceList(array $params)
    {
        return $this->post('order/serviceList', $params);
    }

    //确认货到付款订单 confirmOrder()
    public function confirmOrder(array $params)
    {
        return $this->post('order/stockUp', $params);
    }

    //未支付订单改货款 updateOrderAmount()
    public function updateOrderAmount(array $params)
    {
        return $this->post('order/updateOrderAmount', $params);
    }

    //未支付订单邮费修改 updateOrderPostAmount()
    public function updateOrderPostAmount(array $params)
    {
        return $this->post('order/updatePostAmount', $params);
    }
}
