<?php

namespace App\Repositories;

use App\Models\Book;
use App\Models\Product;
use TestTask\Database\Managers\MySQLManager;

class BookRepository implements IProductRepository
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
    public function save($book)
    {
        // book attributes
        $sku = $book->getSku();
        $name = $book->getName();
        $price = $book->getPrice();
        $type = $book->getType();
        $weight = $book->getWeight();


        Product::create([
            'sku' => $sku,
            'name' => $name,
            'price' => $price,
            'type' => $type
        ]);

        Book::create([
            'product_id' => $this->pdo->lastInsertId(),
            'weight' => $weight
        ]);
        return view('products');
    }


    // get all books from database
    public function getAllProducts()
    {
        $query = "SELECT products.*, books.* FROM products INNER JOIN books ON id = books.product_id";

        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        $all_products = $stmt->fetchAll();

        return $all_products;
    }



    // delete a book from database
    public function delete($id)
    {

        //DELETING product special attr from book table
        $query = "DELETE FROM books WHERE product_id = :id";
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
