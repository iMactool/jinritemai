<?php

/*
 * * Author: cc
 *  * Created by PhpStorm.
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
    public function getAccessToken()
    {
        $accessToken = CacheAdapter::getInstance()->getItem($this->getCacheKey($this->tokenKey));

        if (!$accessToken->isHit()) {
            $accessTokenInfo = CacheAdapter::getInstance()->getItem($this->getCacheKey('access_token_info'));
            if ($accessTokenInfo->isHit()) {
                $refreshToken = $accessTokenInfo->get()['refresh_token'];
                $result = $this->refreshSelfAccessToken($refreshToken);
                if (0 === $result['err_no']) {
                    //更新 key access_token_info
                    $data = $result['data'];
                    $accessTokenInfo->set($data);
                    $accessTokenInfo->expiresAfter(1209600);
                    CacheAdapter::getInstance()->save($accessTokenInfo);

                    //更新 key access_token
                    $accessToken->set($data['access_token']);
                    $accessToken->expiresAfter((int) $data['expires_in']);
                    CacheAdapter::getInstance()->save($accessToken);

                    $this->access_token = $data['access_token'];
                }
            }
        } else {
            $this->access_token = $accessToken->get();
        }

        return $this->access_token;
    }
}
