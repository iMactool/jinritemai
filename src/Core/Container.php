<?php
/**
 * ======================================================
 * Author: cc
 * Created by PhpStorm.
 * Copyright (c)  cc Inc. All rights reserved.
 * Desc: 代码功能描述
 *  ======================================================
 */
namespace Imactool\Jinritemai\Core;

class Container implements \ArrayAccess
{

    /**
     * 中间件
     * @var array
     */
    protected $middlewares = [];

    /**
     * @var array
     */
    private $instances = [];

    /**
     * @var array
     */
    private $values = [];

    /**
     * @var
     */
    public $register;


    public function offsetExists($offset)
    {
        // TODO: Implement offsetExists() method.
    }

    /**
     * @param mixed $offset
     * @return $this|mixed
     */
    public function offsetGet($offset)
    {

        if (isset($this->instances[$offset])){
            return $this->instances[$offset];
        }

        $raw    = $this->values[$offset];
        $value  = $this->values[$offset] = $raw($this);
        $this->instances[$offset] = $value;
        return  $value;

    }

    /**
     * @param mixed $offset
     * @param mixed $value
     */
    public function offsetSet($offset, $value)
    {
       $this->values[$offset] = $value;
    }

    public function offsetUnset($offset)
    {
        // TODO: Implement offsetUnset() method.
    }

    /**
     * 注册服务
     * @param $provider
     * @return $this
     */
    public function serviceRegsiter($provider){

        $provider->serviceProvider($this);
        return $this;
    }

    /**
     * 获取中间件
     * @param array $middlewares
     */
    public function getMiddlewares(){
        return $this->middlewares;
    }

    /**
     * 设置中间件
     * @param array $middlewares
     */
    public function setMiddlewares(array $middlewares){
        $this->middlewares = $middlewares;
    }

    /**
     * 添加中间件
     * @param array $classFun
     * @param string $name
     * @return array
     */
    public function addMiddlewares(array $classFun , $name = ''){
        if (empty($this->middlewares)){
            $this->middlewares[$name] = $classFun;
        }else{
            array_push($this->middlewares, [ $name => $classFun]);
        }
        return $this->middlewares;
    }



}