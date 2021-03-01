<?php

/*
 * Author: cc
 *  Created by PhpStorm.
 *  Copyright (c)  cc Inc. All rights reserved.
 */

namespace Imactool\Jinritemai\Http;

use GuzzleHttp\Client;

class Http
{
    protected $guzzleOptions = [];
    protected $baseUri = 'https://openapi-fxg.jinritemai.com/'; //正式环境

    protected function getHttpClient()
    {
        if (!isset($this->guzzleOptions['base_uri'])) {
            $this->guzzleOptions['base_uri'] = $this->baseUri;
        }

        return new Client($this->guzzleOptions);
    }

    public function request($method, $endpoint, $options = [])
    {
        return $this->unwrapResponse($this->getHttpClient()->{$method}($endpoint, $options));
    }

    /**
     * 统一转换响应结果为 json 格式.
     *
     * @param $response
     */
    protected function unwrapResponse($response)
    {
        $contentType = $response->getHeaderLine('Content-Type');
        $contents = $response->getBody()->getContents();
        if (false !== stripos($contentType, 'json') || stripos($contentType, 'javascript')) {
            return json_decode($contents, true);
        } elseif (false !== stripos($contentType, 'xml')) {
            return json_decode(json_encode(simplexml_load_string($contents)), true);
        }

        return $contents;
    }

    /**
     * 用户可以自定义 guzzle 实例的参数.
     */
    public function setGuzzleOptions(array $options = [])
    {
        $this->guzzleOptions = $options;
    }

    public function setUrl($url)
    {
        $this->baseUri = trim($url, '/').'/';

        return $this;
    }
}
