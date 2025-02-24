<?php

class DatabaseConnection
{



    public $db;

    public function __construct()
    {
        try {
            $conn = new PDO('mysql:host=localhost;dbname=Jerseystore', 'root', '');
            $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
        }
        $this->db = $conn;
    }
}
