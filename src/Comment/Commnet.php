<?php

/*
 * * Author: cc
 *  * Created by PhpStorm.
 */

namespace Imactool\Jinritemai\Comment;

use Imactool\Jinritemai\Core\BaseService;

class Commnet extends BaseService
{
    //获取店铺的评论列表 getCommentList()
    public function getCommentList(array $params)
    {
        return $this->post('comment/list', $params);
    }

    //评价回复 replyComment()
    public function replyComment(array $params)
    {
        return $this->post('comment/reply', $params);
    }
}
