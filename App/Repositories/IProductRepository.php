<?php

namespace App\Repositories;

use App\Models\Product;


interface IProductRepository
{
    // for connection with the DB
    public function connectDb();
    // save a product into db
    public function save(Product $product);
    // get all product from database of a specific type like book, furniture and dvd
    public function getAllProducts();
    // delete a specific product type from the db
    public function delete($id);
}
