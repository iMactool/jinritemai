<?php

/*
 * Author: cc
 *  Created by PhpStorm.
 *  Copyright (c)  cc Inc. All rights reserved.
 */

require __DIR__.'/vendor/autoload.php';

use Imactool\Jinritemai\DouDianApp;

//ini_set('date.timezone','Asia/Shanghai');
date_default_timezone_set('PRC');

$config = [
    'app_key' => '你的appkey',
    'app_secret' => '你的秘钥',
    'service_id' => '你的服务id',
];

$servic = new DouDianApp($config);

//1、获取店铺授权URL
try {
    $authUrl = $servic->Auth->generateAuthUrl('state');
    var_dump($authUrl);
} catch (Exception $exception) {
    var_dump($exception);
}

//2、拿到 URL code 之后，需要调用一次 requestAccessToken(); 之后就不需要再次调用
try {
    $code = '授权店铺token';
    $accessInfo = $servic->Auth->requestAccessToken($code);
    file_put_contents('accesstokeninfo.log', print_r($accessInfo, 1).' -- code:'.$code.PHP_EOL, 8);
    var_dump($accessInfo);
} catch (Exception $exception) {
    var_dump($exception);
}

// 删除店铺缓存,一般在
try {
    $shopid = 2322; ;
    $result = $servic->Auth->clearShopCache($shopid);
    var_export($result);
}catch (Exception $exception){
    var_dump($exception);
}

// 授权方已经把店铺授权给你的抖店开放平台了，接下来的代授权方实现业务只需一行代码即可获得授权方实例。
$shopid = 2322; //$shopid 为授权方店铺的ID shop_id
$refresh_token = '授权店铺token'; //$refresh_token 为授权方的 refresh_token，
$app = $servic->shopApp($shopid, $refresh_token);

//获取店铺的已授权品牌列表
try {
    $result = $app->Shop->getShopBrandList();
    echo '调用结果：';
    var_dump($result);
} catch (Exception $exception) {
    var_dump($exception);
}

//获取店铺后台供商家发布商品的类目
try {
    $result = $app->Shop->getShopCategory(['cid' => 0]);
    //var_export($result);
    file_put_contents('getShopCategory.log', print_r($result, 1));
    $result = $app->Shop->getShopCategory(['cid' => 20038]);
    file_put_contents('getShopCategory.log', PHP_EOL.' - 继续请求获取 20038 下的 '.print_r($result, 1), 8);
    $result = $app->Shop->getShopCategory(['cid' => 20666]);
    file_put_contents('getShopCategory.log', PHP_EOL.' - 继续请求获取 20666 下的 '.print_r($result, 1), 8);
} catch (Exception $exception) {
    var_dump($exception);
}

//添加规格
try {
    $spec = [];
    $spec['specs'] = '材质|乳胶床垫^软硬度|软硬适中^面料|针织棉面料';
    //$spec['name'] = '';
    $result = $app->Product->addSpec($spec);
    var_export($result);
    file_put_contents('spec.log', PHP_EOL.' - 添加规格 '.print_r($result, 1), 8);
} catch (Exception $exception) {
    var_dump($exception);
}

//添加商品
try {
    $product = [];
    $product['out_product_id'] = '1232432423432';
    $product['name'] = '慕思乳胶床垫静音独立筒弹簧1.5m单双人';
    $product['pic'] = 'https://img10.360buyimg.com/imgzone/jfs/t1/54292/8/7852/571691/5d553b67E6e5102ce/f74fcde197507dc6.jpg|https://img10.360buyimg.com/imgzone/jfs/t1/57312/39/7619/675304/5d553b68Ec7e042b2/0c1ecfa059c93b4d.jpg';
    $product['description'] = 'https://img10.360buyimg.com/imgzone/jfs/t1/75892/29/7333/488315/5d553b68E5b74c058/afad6cd48608b03d.jpg|https://img10.360buyimg.com/imgzone/jfs/t1/52084/36/7728/336579/5d553b6bE5e83d5f3/5cdf4a12847f872a.jpg|https://img10.360buyimg.com/imgzone/jfs/t1/67703/7/494/245238/5ceb5cf3E326e7e7f/1fde813c74926d26.jpg';
    $product['market_price'] = '619800';
    $product['discount_price'] = '1';
    //$product['first_cid'] = '2';
    //$product['second_cid'] = '100';
    //$product['third_cid'] = '1000';
    $product['spec_id'] = '1692818797410320';
    $product['mobile'] = '13122225555';
    $product['weight'] = '50000';
    $product['product_format'] = '材质|乳胶床垫^软硬度|软硬适中^面料|针织棉面料';
    $product['pay_type'] = '1';
    $product['category_leaf_id'] = '25019'; // 如果没传category_leaf_id，走之前的逻辑，需要把老的类目ID传入first_cid、second_cid、third_cid这三个字段
//$result = $app->Product->addProduct($product);
//var_export($result);
//file_put_contents('product.log',PHP_EOL.' - 添加商品 '.print_r($result,1).PHP_EOL,8);
} catch (Exception $exception) {
    var_dump($exception);
}
/*
 * array (
'data' =>
array (
'product_id' => 3466902402467262633,
'out_product_id' => 1232432423432,
'create_time' => '2021-02-27 13:03:56',
),
'err_no' => 0,
'message' => 'success',

 */

//添加商品(新的商品发布接口)
try {
    $product = [];
    $product['product_type'] = '0';
    $product['product_format'] = '材质|乳胶床垫^软硬度|软硬适中^面料|针织棉面料';
    $product['name'] = '慕思乳胶床垫智能超静音独立筒弹簧';
    $product['pic'] = 'https://img10.360buyimg.com/imgzone/jfs/t1/54292/8/7852/571691/5d553b67E6e5102ce/f74fcde197507dc6.jpg|https://img10.360buyimg.com/imgzone/jfs/t1/57312/39/7619/675304/5d553b68Ec7e042b2/0c1ecfa059c93b4d.jpg';
    $product['description'] = 'https://img10.360buyimg.com/imgzone/jfs/t1/75892/29/7333/488315/5d553b68E5b74c058/afad6cd48608b03d.jpg|https://img10.360buyimg.com/imgzone/jfs/t1/52084/36/7728/336579/5d553b6bE5e83d5f3/5cdf4a12847f872a.jpg|https://img10.360buyimg.com/imgzone/jfs/t1/67703/7/494/245238/5ceb5cf3E326e7e7f/1fde813c74926d26.jpg';
    $product['pay_type'] = '1';
    $product['market_price'] = '619800';
    $product['discount_price'] = '1';
    $product['reduce_type'] = '1';
    $product['freight_id'] = '0';
    $product['delivery_delay_day'] = '7';
    $product['supply_7day_return'] = '1';
    $product['commit'] = 'true';
    $product['mobile'] = '13122225555';
    $product['weight'] = '50000';
    $product['weight_unit'] = '1';
    $product['specs'] = '颜色|黑色,白色,黄色^尺码|S,M,L';
    $product_spec_prices = [
        [
            'spec_detail_name1' => '黑色',
            'stock_num' => 2,
            'price' => 1,
        ],
    ];
    $product['spec_prices'] = json_encode($product_spec_prices);

    $product['category_leaf_id'] = '25019';

    $result = $app->Product->addProductV2($product);
    var_export($result);
    if (0 === $result['err_no']) {
        file_put_contents('product.log', PHP_EOL.' - 添加商品addProductV2 '.print_r($result, 1).PHP_EOL, 8);
    }
} catch (Exception $exception) {
    var_dump($exception);
}

//查询库存
try {
    $params = [];
    $params['sku_id'] = '11222';
    $params['out_warehouse_id'] = 'abcd';
    $result = $app->Stock->getStockNum($params);
    var_export($result);
} catch (Exception $exception) {
    var_dump($exception);
}

//获取订单列表
try {
    $params = [];
    $params['start_time'] = '2020/01/01 00:01:00';
    $params['end_time'] = '2021/04/07 00:01:00';
    $params['order_by'] = 'create_time';
    $result = $app->Order->getOrderList($params);
    file_put_contents(date('Ymd').'-order.log', print_r($result, 1));
    var_dump($result);
} catch (Exception $exception) {
    var_dump($exception);
}
