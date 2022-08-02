<?php

namespace App\Repositories;

use App\Models\Product;
use App\Models\Furniture;
use TestTask\Database\Managers\MySQLManager;

class FurnitureRepository implements IProductRepository
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



    // save a product furniture into database
    public function save($furniture)
    {
        // furniture attributes
        $sku = $furniture->getSku();
        $name = $furniture->getName();
        $price = $furniture->getPrice();
        $type = $furniture->getType();
        $width = $furniture->getWidth();
        $height = $furniture->getHeight();
        $length = $furniture->getLength();

        Product::create([
            'sku' => $sku,
            'name' => $name,
            'price' => $price,
            'type' => $type
        ]);

        Furniture::create([
            'product_id' => $this->pdo->lastInsertId(),
            'width' => $width,
            'height' => $height,
            'length' => $length
        ]);

        return view('products');
    }


    public function getAllProducts()
    {
        $query = "SELECT products.*, furnitures.* FROM products INNER JOIN furnitures ON id = furnitures.product_id";

        $stmt = $this->pdo->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll();
    }



    public function delete($id)
    {
        //DELETING product special attr from furnitures table
        $query = "DELETE FROM furnitures WHERE product_id = :id";
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
