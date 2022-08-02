<?php

namespace App\Repositories;

use App\Models\DVD;
use App\Models\Product;
use TestTask\Database\Managers\MySQLManager;

class DVDRepository implements IProductRepository
{
    private $pdo;

    public function __construct()
    {
        $this->connectDb();
    }


    public function connectDb()
    {
        $mySQLManager = new MySQLManager();
        $this->pdo = $mySQLManager->connect();
    }



    // save a product book into database
    public function save($dvd)
    {
        $sku = $dvd->getSku();
        $name = $dvd->getName();
        $price = $dvd->getPrice();
        $type = $dvd->getType();
        $size = $dvd->getSize();

        Product::create([
            'sku' => $sku,
            'name' => $name,
            'price' => $price,
            'type' => $type
        ]);

        DVD::create([
            'product_id' => $this->pdo->lastInsertId(),
            'size' => $size
        ]);

        return view('products');
    }


    // get all dvds from database
    public function getAllProducts()
    {
        $query = "SELECT products.*, dvds.* FROM products INNER JOIN dvds ON id = dvds.product_id";

        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        $all_products = $stmt->fetchAll();

        return $all_products;
    }



    // delete a dvd from database
    public function delete($id)
    {

        //DELETING product special attr from dvd table
        $query = "DELETE FROM dvds WHERE product_id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id);

        $stmt->execute();

        //DELETING product from products table
        $query = "DELETE FROM products WHERE id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id);

        $stmt->execute();

        return view('products');
    }
}
