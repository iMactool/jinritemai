<?php

/*
 * Author: cc
 *  Created by PhpStorm.
 *  Copyright (c)  cc Inc. All rights reserved.
 */

namespace Imactool\Jinritemai\AfterSale;

use Imactool\Jinritemai\Core\BaseService;

class AfterSale extends BaseService
{
    //商家为订单添加售后备注 afterSaleAddOrderRemark()
    public function afterSaleAddOrderRemark(array $params)
    {
        return $this->post('afterSale/addOrderRemark', $params);
    }

    //商家确认处理换货申请 buyerExchange()
    public function buyerExchange(array $params)
    {
        return $this->post('afterSale/buyerExchange', $params);
    }

    //商家确认是否收到换货 buyerExchangeConfirm()
    public function buyerExchangeConfirm(array $params)
    {
        return $this->post('afterSale/buyerExchangeConfirm', $params);
    }

    //商家发货后仅退款申请 buyerRefund()
    public function buyerRefund(array $params)
    {
        return $this->post('afterSale/buyerRefund', $params);
    }

    //商家处理退货申请 buyerReturn()
    public function buyerReturn(array $params)
    {
        return $this->post('afterSale/buyerReturn', $params);
    }

    //商家确认是否收到退货 firmReceive()
    public function firmReceive(array $params)
    {
        return $this->post('afterSale/firmReceive', $params);
    }

    //根据子订单ID查询退款详情 refundProcessDetail()
    public function refundProcessDetail(array $params)
    {
        return $this->post('afterSale/refundProcessDetail', $params);
    }

    //卖家提交举证信息 submitEvidence()
    public function submitEvidence(array $params)
    {
        return $this->post('aftersale/submitEvidence', $params);
    }

    //商家延长售后收货时限 timeExtend()
    public function timeExtend(array $params)
    {
        return $this->post('afterSale/timeExtend', $params);
    }

    //货到付款订单上传退款凭证 uploadCompensation()
    public function uploadCompensation(array $params)
    {
        return $this->post('afterSale/uploadCompensation', $params);
    }

    //商家处理备货中退款申请 shopRefund()
    public function shopRefund(array $params)
    {
        return $this->post('refund/shopRefund', $params);
    }

    //售后单列表查询 refundListSearch()
    public function refundListSearch(array $params)
    {
        return $this->post('trade/refundListSearch', $params);
    }
}
