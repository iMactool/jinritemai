<?php

/*
 * Author: cc
 *  Created by PhpStorm.
 *  Copyright (c)  cc Inc. All rights reserved.
 */

namespace Imactool\Jinritemai\Bill;

use Imactool\Jinritemai\Core\BaseService;

class Bill extends BaseService
{
    //仅自用型应用可使调用该接口 查询订单账单明细
    public function settle($params)
    {
        return $this->post('order/settle', $params);
    }

    //查询联盟订单明细
    public function getOrderList($params)
    {
        return $this->post('alliance/getOrderList', $params);
    }

    //查询账单明细
    public function getSettleBillDetail($params)
    {
        return $this->post('order/getSettleBillDetail', $params);
    }
}
