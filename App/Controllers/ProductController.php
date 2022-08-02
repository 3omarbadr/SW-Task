<?php

namespace App\Controllers;

use TestTask\Support\RenderAttr;
use TestTask\Support\ProductHelpers;
use TestTask\Support\ProductsReposDirector;

class ProductController
{
    use ProductHelpers;
    use RenderAttr;


    public function index()
    {
        $products = $this->getProducts();
        $sortedProducts = $this->sortProducts($products);
        $idsWithToBeRenderedSpecialAttrs = $this->idsWithToBeRenderedSpecialAttrs($sortedProducts);
        $this->data['idsWithSpecialAttrs'] = $idsWithToBeRenderedSpecialAttrs;
        $this->data['products'] = $sortedProducts;

        return view('products', ['products' => $products, 'idsWithSpecialAttrs' => $this->data['idsWithSpecialAttrs']]);
    }

    public function create()
    {
        return view('add-product');
    }

    public function store()
    {
        if (isset($_POST['typeSwitcher'])) {

            $productType = $_POST['typeSwitcher'];

            $product = $this->createProduct($productType);

            $productRepo = $this->createProductRepo($productType);

            $productRepo->save($product);
            app()->session->setFlash('success', 'Product Added Successfully');
        }

        return back('/');
    }

    public function delete()
    {
        $productsReposDirector = new ProductsReposDirector;
        $idsWithTypes = $_POST;

        foreach ($idsWithTypes as $id => $type) {
            $productRepo = $productsReposDirector->instantiateRepo($type);
            $productRepo->delete($id);
        }

        return back('/');
    }
}
