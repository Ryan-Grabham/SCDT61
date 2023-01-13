<?php

class ProductController
{
    protected $db;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function create(array $product) : int
    {

            $sql = "INSERT INTO products(name, description, price, image, categoryid)
                    VALUES (:name, :description, :price, :image, :categoryid);";
            $this->db->runSQL($sql, $product);
            return $this->db->lastInsertId();

    }

    public function get(int $id)
    {
        $sql = "SELECT * FROM products WHERE id = :id";
        $args = ['id' => $id];
        return $this->db->runSQL($sql, $args) -> fetch();
    }

    public function getAll() : array
    {
        $sql = "SELECT * FROM products";
        return $this->db->runSQL($sql) -> fetchAll();
    }

    public function getCategoryNameById(int $categoryId) 
    {
        $sql = "SELECT categoryname FROM categories WHERE categoryid = :categoryId";
        $args = ['categoryId' => $categoryId];
        return $this->db->runSQL($sql, $args) -> fetch();
    }

    public function update(array $product) : bool
    {
        $sql = "UPDATE products 
                SET name = :name, 
                    description = :description, 
                    price = :price, 
                    image = :image,
                    categoryid = :categoryid

                WHERE id = :id;";
        
        return $this->db->runSQL($sql, $product)->execute();
    }

    public function delete(int $id) : bool
    {
        $sql = "DELETE FROM products WHERE id = :id";
        return $this->db->runSQL($sql, ['id' => $id])->execute();
    }


}

?>