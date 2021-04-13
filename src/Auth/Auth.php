<?php

/*
 * Author: cc
 *  Created by PhpStorm.
 *  Copyright (c)  cc Inc. All rights reserved.
 */

namespace Imactool\Jinritemai\Auth;

use Imactool\Jinritemai\Core\BaseService;
use Imactool\Jinritemai\Core\CacheAdapter;
use Symfony\Contracts\Cache\ItemInterface;

class Auth extends BaseService
{
    use CacheAdapter;

    /**
     * 店铺授权 URL.
     *
     * @return string
     */
    public function generateAuthUrl(string $state)
    {
        $url = 'https://fuwu.jinritemai.com/authorize';
        $query = [
            'service' => $this->appRunConfig['service_id'],
            'state' => $state,
        ];

        return $url.'?'.http_build_query($query);
    }

    /**
     * 请求获取 access_token.
     *
     * @param $code
     *
     * @return mixed
     */
    public function requestAccessToken($code)
    {
        $params = [
            'app_id' => $this->appRunConfig['app_key'],
            'app_secret' => $this->appRunConfig['app_secret'],
            'code' => $code,
            'grant_type' => 'authorization_code',
        ];

        $options = [
            'headers' => [],
            'query' => $params,
        ];
        $result = $this->httpClient()->request('get', 'oauth2/access_token', $options);

        if (0 !== $result['err_no']) {
            return $result;
        }

        return $result;
    }

    /**
     * 刷新 access_token
     * 如果refresh_token也过期了，则只能让商家点击“使用”按钮，会打开应用使用地址，
     * 地址参数里会带上新的授权code。然后用新的code，重新调接口，获取新的access_token。
     *
     * @see https://op.jinritemai.com/help/faq/43/206
     *
     * @param $refresh_token
     *
     * @return mixed
     */
    public function refreshAccessToken($refresh_token)
    {
        $params = [
            'app_id' => $this->appRunConfig['app_key'],
            'app_secret' => $this->appRunConfig['app_secret'],
            'refresh_token' => $refresh_token, //十分钟有效
            'grant_type' => 'refresh_token',
        ];
        $options = [
            'headers' => [],
            'query' => $params,
        ];
        $result = $this->httpClient()->request('get', 'oauth2/refresh_token', $options);

        if (0 !== $result['err_no']) {
            return $result;
        }

        return $result;
    }

}
