<?php
namespace TestTask\Support;

// directors
use TestTask\Support\ProductsModelsDirector;
use TestTask\Support\ProductsReposDirector;

trait ProductHelpers
{
    private function getReposClasses()
    {
        $productsReposDirector = new ProductsReposDirector;
        $reposClasses = $productsReposDirector->getReposClasses();

        return $reposClasses;
    }


    
    // this is for getting all types' products
    private function getProducts()
    {

        // repos classes
        $reposClasses = $this->getReposClasses();
        // dd($reposClasses);

        // getting all products of all types
        $products = [];
        foreach ($reposClasses as $repoClass) {
            $repo = new $repoClass;

            $typeProducts = $repo->getAllProducts();
            foreach ($typeProducts as $product) {
                array_push($products, $product);
            }
        }

        return $products;
    }



    //arranging products by the product_id which means by who was created first
    private function sortProducts($products)
    {
        usort(
            $products,
            function ($a, $b) {
            return $a['product_id'] <=> $b['product_id'];
        }
        );

        return $products;
    }



    // Model instantiation
    private function createProduct($type)
    {
        $productsModelsDirector = new ProductsModelsDirector;
        $model = $productsModelsDirector->instantiateModel($type);
        $model->setAttrs($_POST);

        return $model;
    }



    private function createProductRepo($type)
    {
        $productsReposDirector = new productsReposDirector;
        $productRepo = $productsReposDirector->instantiateRepo($type);

        return $productRepo;
    }
}
