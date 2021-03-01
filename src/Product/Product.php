<?php

/*
 * * Author: cc
 *  * Created by PhpStorm.
 */

namespace Imactool\Jinritemai\Product;

use Imactool\Jinritemai\Core\BaseService;

class Product extends BaseService
{
    /**
     * 添加商品
     * 创建商品的接口，商品添加成功后会自动进入平台的异步机审流程，机审完成后将自动上架。
     * 如果添加成功后，没有在后台页面上找到商品，可前往草稿箱查看。
     */
    public function addProduct(array $params): array
    {
        return $this->post('product/add', $params);
    }

    /**
     * 添加商品
     * 新的商品发布接口，一次性完成商品-规格-SKU的发布，更高效的上传商品方式。
     */
    public function addProductV2(array $params): array
    {
        return $this->post('product/addV2', $params);
    }

    //运费模板查询 getFreightTemplateList()
    public function getFreightTemplateList(array $params)
    {
        return $this->post('freightTemplate/list', $params);
    }

    //删除商品 delProduct()
    public function delProduct(array $params)
    {
        return $this->post('product/del', $params);
    }

    //获取商品详情 getProduct()
    public function getProduct(array $params)
    {
        return $this->post('product/detail', $params);
    }

    //编辑商品 editProduct()
    public function editProduct(array $params)
    {
        return $this->post('product/edit', $params);
    }

    //编辑商品 editProductV2()
    public function editProductV2(array $params)
    {
        return $this->post('product/editV2', $params);
    }

    //编辑商品限购 setProductBuyerLimit()
    public function setProductBuyerLimit(array $params)
    {
        return $this->post('product/editBuyerLimit', $params);
    }

    //根据商品分类获取对应的属性列表 getPrdocutCateProperty()
    public function getPrdocutCateProperty(array $params)
    {
        return $this->post('product/getCateProperty', $params);
    }

    //获取商品列表 getProductList()
    public function getProductList(array $params)
    {
        return $this->post('product/list', $params);
    }

    //商品下架 setProductOffline()
    public function setProductOffline(array $params)
    {
        return $this->post('product/setOffline', $params);
    }

    //商品上架 setProductOnline()
    public function setProductOnline(array $params)
    {
        return $this->post('product/setOnline', $params);
    }

    //添加SKU addSku()
    public function addSku(array $params)
    {
        return $this->post('sku/add', $params);
    }

    //批量添加sku addAllSku()
    public function addAllSku(array $params)
    {
        return $this->post('sku/addAll', $params);
    }

    //获取商品sku详情 getSku()
    public function getSku(array $params)
    {
        return $this->post('sku/detail', $params);
    }

    //修改sku编码 editSkuCode()
    public function editSkuCode(array $params)
    {
        return $this->post('sku/editCode', $params);
    }

    //编辑sku价格 editSkuPrice()
    public function editSkuPrice(array $params)
    {
        return $this->post('sku/editPrice', $params);
    }

    //修改sku对应的供应商编码ID editSupplierId()
    public function editSupplierId(array $params)
    {
        return $this->post('sku/editSupplierId', $params);
    }

    //获取商品sku列表 getSkuList()
    public function getSkuList(array $params)
    {
        return $this->post('sku/list', $params);
    }

    //修改sku库存 editSkuStock()
    public function editSkuStock(array $params)
    {
        return $this->post('sku/syncStock', $params);
    }

    //批量修改sku库存 editSkuStockBatch()
    public function editSkuStockBatch(array $params)
    {
        return $this->post('sku/syncStockBatch', $params);
    }

    /**
     * 添加规格 addSpec().
     */
    public function addSpec(array $params)
    {
        return $this->post('spec/add', $params);
    }

    //删除规格 delSpec()
    public function delSpec(array $params)
    {
        return $this->post('spec/del', $params);
    }

    //获取规格列表 getSpecList()
    public function getSpecList(array $params)
    {
        return $this->post('spec/list', $params);
    }

    //获取规格详情 getSpec()
    public function getSpec(array $params)
    {
        return $this->post('spec/specDetail', $params);
    }
}
