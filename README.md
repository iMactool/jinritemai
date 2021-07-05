<h1 align="center"> jinritemai </h1>

<p align="center"> 工具型抖店开放平台SDK.</p>

[![Build Status](https://travis-ci.org/iMactool/jinritemai.svg?branch=master)](https://travis-ci.org/iMactool/jinritemai) [![StyleCI](https://github.styleci.io/repos/343340719/shield?branch=master)](https://github.styleci.io/repos/343340719?branch=master) 
[![Latest Stable Version](https://poser.pugx.org/imactool/jinritemai/v)](//packagist.org/packages/imactool/jinritemai)
[![Latest Unstable Version](https://poser.pugx.org/imactool/jinritemai/v/unstable)](//packagist.org/packages/imactool/jinritemai)
[![Total Downloads](https://poser.pugx.org/imactool/jinritemai/downloads)](//packagist.org/packages/imactool/jinritemai)
[![License](https://poser.pugx.org/imactool/jinritemai/license)](//packagist.org/packages/imactool/jinritemai)

## 环境需求

```js
PHP >= 7.1
PHP cURL 扩展
PHP OpenSSL 扩展
```
    
## Installing

```shell
$ composer require imactool/jinritemai
```

## Usage 
> 具体可以看 example 示例代码 ，需要 composer install 

### 授权相关

```

require __DIR__ .'/vendor/autoload.php';

use Imactool\Jinritemai\DouDianApp;

date_default_timezone_set('PRC');

$config = [
    'app_key'       => '你的appkey',
    'app_secret'    => '你的秘钥',
    'service_id'    => '你的服务id' 
];

$servic = new DouDianApp($config);

```

### 工具型应用授权
```
#1、先获取 获取店铺授权URL
$authUrl = $servic->Auth->generateAuthUrl('state');
 

#2、拿到 URL code 之后，需要调用一次 requestAccessToken() 获取授权方授权信息 ; 
# 店铺同意授权后，使用授权code，GET方式请求可获取access_token：
$code = 'URL code ';
$accessInfo = $servic->Auth->requestAccessToken($code);
 
 ```

### 自用型应用授权

``` 
$shopid = 23; //$shopid 为授权方店铺的ID shop_id
try {
    $accessInfo = $servic->Auth->getShopAccessToken($shopid);
    echo "调用结果：";
    var_dump($accessInfo);
}catch (Exception $exception){
    var_dump($exception);
}
```


目前工具已支持 `自用型应用授权` 和 `工具型应用授权` 两种授权类型。主要区别如下

|店铺授权类型	|调用方式|说明|
|---|---|---|
|工具型应用授权	|1、`$authUrl = $servic->Auth->generateAuthUrl('state');`|	先获取 获取店铺授权URL|
|工具型应用授权	|2、 ` $code = 'URL code'; $accessInfo = $servic->Auth->requestAccessToken($code); ` |拿到 URL code 之后，需要调用一次 requestAccessToken() 获取授权方授权信息 ;店铺同意授权后，使用授权code，GET方式请求可获取access_token：|
||
|自用型应用授权|1、`$shopid = 23;  $servic->Auth->getShopAccessToken($shopid)`|自用型 - 获取access_token|



### 获取授权方实例
> 这里 `自用型应用授权` 和 `工具型应用授权` 都是一样的用法
```
# 授权方已经把店铺授权给你的抖店开放平台了，接下来的代授权方实现业务只需一行代码即可获得授权方实例。
$shopid = 2222; //$shopid 为授权方店铺的ID shop_id
$refresh_token = '授权店铺token'; //$refresh_token 为授权方的 refresh_token，可通过 获取授权方授权信息 (`$servic->Auth->requestAccessToken($code)`) 接口获得。

$app = $servic->shopApp($shopid,$refresh_token);


#3.开始调用接口 
$result = $shopAccount->getShopBrandList();

```


## 实现接口
> 基于抖店开放平台的（工具型、自用型）SDK ，即本`SDK`是服务第三方开发者创建工具型应用（工具型应用必须上架，才能走授权流程）
> 以下列出来的接口都是已实现的
> 具体可以看 src/DouDianApp.php .
> $app 在本文档都是指的 `$servic->shopApp($shopid,$refresh_token);` 得到的实例
> 不需要自己刷新 refresh_token SDK 内部会自动实现刷新。
> 当如果返回 token 过期 请参考[问题](#问题)
>

 
#### 店铺api  `$app->Shop` 
> 例如 `$app->Shop->getShopBrandList()` 

 - 获取店铺的已授权品牌列表 getShopBrandList()
 - 获取店铺后台供商家发布商品的类目 getShopCategory()
 - 售后地址列表接口 addRessList()
   
#### 商品api `$app->Shop`
> `$app->Shop->addProduct($params)`

- 运费模板查询 getFreightTemplateList()
- 添加商品 addProduct()
- 商品发布 addProductV2()
- 删除商品 delProduct()
- 获取商品详情  getProduct()
- 编辑商品   editProduct()
- 编辑商品   editProductV2()
- 编辑商品限购 setProductBuyerLimit()
- 根据商品分类获取对应的属性列表 getPrdocutCateProperty()
- 获取商品列表 getProductList()
- 商品下架 setProductOffline()
- 商品上架 setProductOnline()
- 添加SKU addSku()
- 批量添加sku addAllSku()
- 获取商品sku详情 getSku()
- 修改sku编码 editSkuCode()
- 编辑sku价格 editSkuPrice()
- 修改sku对应的供应商编码ID editSupplierId()
- 获取商品sku列表 getSkuList()
- 修改sku库存 editSkuStock()
- 批量修改sku库存 editSkuStockBatch()
- 添加规格 addSpec()
- 删除规格 delSpec()
- 获取规格列表 getSpecList()
- 获取规格详情 getSpec()
- 获取商品列表新版 getProductListV2()
 

####  订单 api `$app->Order`

- 添加订单备注 addOrderRemark()
- 设置店铺设置地址变更审核 setAddressAppliedSwitch()
- 买家地址变更确认 addressConfirm()
- 买家主动修改收货地址 addressModify()
- 取消(货到付款)订单 cancelOrder()
- 获取订单详情 getOrder()  即将下线
- 获取订单详情 getOrderDetail()  即将下线
- 获取服务单列表 getServiceOrderList()
- 获取订单列  getOrderList() 即将下线
- 获取订单列  getOrderSearchList() 新
- 回复服务请求 replyService()
- 查询商家服务单详情请求 serviceDetail()
- 获取服务请求列表 serviceList()
- 确认货到付款订单 confirmOrder()
- 未支付订单改货款 updateOrderAmount()
- 未支付订单邮费修改  updateOrderPostAmount()

####  物流 api `$app->Logistics`
 
- 获取区列表 areaList()
- 获取市列表  cityList()
- 获取省列表  provinceList()
- 订单发货   sendOrderLogistics()
- 一个父订单可发多个物流包裹  sendOrderLogisticsMultiPack()
- 支持多个子订单发同一个物流包裹 sendOrderLogisticsSinglePack
- 获取快递公司列表 logisticsCompanyList()
- 修改发货物流  editLogisticsEdit()
- 修改包裹里的物流信息 editLogisticsByPack()

####  售后退款 api  `$app->AfterSale`

- 商家为订单添加售后备注 afterSaleAddOrderRemark()
- 商家确认处理换货申请 buyerExchange()
- 商家确认是否收到换货 buyerExchangeConfirm()
- 商家发货后仅退款申请 buyerRefund()
- 商家处理退货申请 buyerReturn()
- 商家确认是否收到退货 firmReceive()
- 根据子订单ID查询退款详情 refundProcessDetail()
- 卖家提交举证信息  submitEvidence()
- 商家延长售后收货时限 timeExtend()
- 货到付款订单上传退款凭证 uploadCompensation()
- 商家处理备货中退款申请 shopRefund()
- 售后单列表查询  refundListSearch()

#### 运费险API `$app->Insurance`

- 获取运费险保单详情 insurance()

#### 库存 API `$app->Stock`

- 查询库存 getStockNum()
- 创建单个区域仓 createWarehouse()
- 批量创建区域仓 createBatchWarehouse()
- 编辑区域仓  editWarehouse()
- 查询区域仓  getWarehouse()
- 批量查询区域仓 getWarehouseList()
- 地址与区域仓解绑 removeAddrWarehouse()
- 绑定单个地址到区域仓 setAddrWarehouse()
- 批量绑定地址与区域仓 setBatchAddrWarehouse()
- 设置指定地址下的仓的优先级 setPriorityWarehouse()

#### 账单 API

- 仅自用型应用可使调用该接口 ，(非工具型)暂不支持

#### 评价 API `$app->Commnet`

- 获取店铺的评论列表 getCommentList()
- 评价回复  replyComment()


## 问题
- [access_token过期了该怎么办？](https://op.jinritemai.com/help/faq/43/207)
> 工具型应用：
  可以使用refresh_token，调接口，获得新的access_token，详见工具型应用授权指南
  如果refresh_token也过期了，则只能让商家点击“使用”按钮，会打开应用使用地址，地址参数里会带上新的授权code。然后用新的code，重新调接口，获取新的access_token。 商家如何使用应用

 
## License

MIT