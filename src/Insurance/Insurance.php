<?php

/*
 * * Author: cc
 *  * Created by PhpStorm.
 */

namespace Imactool\Jinritemai\Insurance;

use Imactool\Jinritemai\Core\BaseService;

class Insurance extends BaseService
{
    //获取运费险保单详情 insurance()
    public function insurance(array $params)
    {
        return $this->post('order/insurance', $params);
    }
}
