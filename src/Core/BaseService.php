<?php

/*
 * * Author: cc
 *  * Created by PhpStorm.
 */

namespace Imactool\Jinritemai\Core;

use Imactool\Jinritemai\Http\Client;

class BaseService
{
    use Client;

    protected $app;

    public $appRunConfig = [];

    public function __construct(Container $app)
    {
        $this->app = $app;

        $this->appRunConfig = self::getAppConfig();
    }
}
