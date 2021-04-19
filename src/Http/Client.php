<?php

/*
 * Author: cc
 *  Created by PhpStorm.
 *  Copyright (c)  cc Inc. All rights reserved.
 */

namespace Imactool\Jinritemai\Http;

trait Client
{
    use AuthService;

    public static $client;
    protected static $appConfig = [];
    protected $shop_access_token_key = 'imactool.shop.access_token.'; //店铺 token 缓存 key

    public function httpClient()
    {
        if (!self::$client) {
            self::$client = new Http();
        }

        return self::$client;
    }

    public static function setAppConfig($key, $appConfig)
    {
        self::$appConfig[$key] = $appConfig;
    }

    public static function getAppConfig($key = null)
    {
        if (is_null($key)) {
            return self::$appConfig['config'];
        }

        return self::$appConfig['config'][$key];
    }

    public static function setShopConfig($shopConfig)
    {
        self::$appConfig = array_merge(self::getAppConfig(), $shopConfig);
    }

    public static function getShopConfig($key = null)
    {
        if (is_null($key)) {
            return self::$appConfig['shop'];
        }

        return self::$appConfig['shop'][$key];
    }

    public static function getAllConfig()
    {
        return self::$appConfig;
    }

    public function authorizerTokenKey()
    {
        return $this->shop_access_token_key.self::getShopConfig('shopId');
    }

    /**
     * 发送 get 请求
     *
     * @param string $endpoint
     * @param array  $query
     * @param array  $headers
     *
     * @return mixed
     */
    public function get($endpoint, $query = [], $headers = [])
    {
        $query = $this->generateParams($endpoint, $query);

        return $this->httpClient()->request('get', $endpoint, [
            'headers' => $headers,
            'query' => $query,
        ]);
    }

    /**
     * 发送 post 请求
     *
     * @param string $endpoint
     * @param array  $params
     * @param array  $headers
     *
     * @return mixed
     */
    public function post($endpoint, $params = [], $headers = [])
    {
        $params = $this->generateParams($endpoint, $params);

        return $this->httpClient()->request('post', $endpoint, [
            'header' => $headers,
            'form_params' => $params,
        ]);
    }

    /**
     * 用 json 的方式发送 post 请求
     *
     * @param $endpoint
     * @param array $params
     * @param array $headers
     *
     * @return mixed
     */
    public function postJosn($endpoint, $params = [], $headers = [])
    {
        $params = $this->generateParams($endpoint, $params);

        return $this->httpClient()->request('post', $endpoint, [
            'headers' => $headers,
            'json' => $params,
        ]);
    }

    /**
     * 组合公共参数、业务参数.
     *
     * @see https://op.jinritemai.com/docs/guide-docs/10/23
     *
     * @param string $url    支持 /shop/brandList 或者 shop/brandList 格式
     * @param array  $params 业务参数
     */
    protected function generateParams(string $url, array $params)
    {
        $method = ltrim(str_replace('/', '.', $url), '.');
        $accessToken = $this->getAccessToken($this->authorizerTokenKey(), self::getShopConfig('refreshToken'));

        //公共参数
        $publicParams = [
            'method' => $method,
            'app_key' => self::getAppConfig('app_key'),
            'access_token' => $accessToken,
            'timestamp' => date('Y-m-d H:i:s'),
            'v' => '2',
            'sign_method' => 'md5',
        ];

        //业务参数
        ksort($params);
        $params_json = \json_encode((object) $params, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

        $string = 'app_key'.$publicParams['app_key'].'method'.$method.'param_json'.$params_json.'timestamp'.$publicParams['timestamp'].'v'.$publicParams['v'];
        $md5Str = self::getAppConfig('app_secret').$string.self::getAppConfig('app_secret');
        $sign = md5($md5Str);

        return array_merge($publicParams, [
            'param_json' => $params_json,
            'sign' => $sign,
        ]);
    }

    /**
     * 尝试刷新自己 cache 的 token 刷新 access_token
     * 如果refresh_token也过期了，则只能让商家点击“使用”按钮，会打开应用使用地址，
     * 地址参数里会带上新的授权code。然后用新的code，重新调接口，获取新的access_token。
     *
     * @see https://op.jinritemai.com/help/faq/43/206
     *
     * @param $refresh_token
     *
     * @return mixed
     */
    public function refreshSelfAccessToken($refresh_token)
    {
        $params = [
            'app_id' => self::getAppConfig('app_key'),
            'app_secret' => self::getAppConfig('app_secret'),
            'refresh_token' => $refresh_token, //十分钟有效
            'grant_type' => 'refresh_token',
        ];
        $options = [
            'headers' => [],
            'query' => $params,
        ];
        $result = $this->httpClient()->request('get', 'oauth2/refresh_token', $options);

        return $result;
    }
}
