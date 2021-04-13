<?php

/*
 * Author: cc
 *  Created by PhpStorm.
 *  Copyright (c)  cc Inc. All rights reserved.
 */

namespace Imactool\Jinritemai\Http;

use Imactool\Jinritemai\Core\CacheAdapter;

trait AuthService
{
    use CacheAdapter;

    /**
     * 尝试获取可用的 access_token.
     *
     * @return string
     */
    public function getAccessToken($shopkey,$refreshToken)
    {

        $accessToken = CacheAdapter::getInstance()->getItem($shopkey);

        if (!$accessToken->isHit()) {

                $result = $this->refreshSelfAccessToken($refreshToken);
                if (0 === $result['err_no']) {
                    $data = $result['data'];
                    //更新 key access_token
                    $accessToken->set($data['access_token']);
                    $accessToken->expiresAfter((int) $data['expires_in']);
                    CacheAdapter::getInstance()->save($accessToken);

                    $this->access_token = $data['access_token'];
                }

        } else {
            $this->access_token = $accessToken->get();
        }

        return $this->access_token;
    }
}
