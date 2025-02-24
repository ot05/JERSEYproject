<?php
require_once __DIR__ . '/../Core/DatabaseConnection.php';
class TeamController
{
    public function index()
    {
        $database = new DatabaseConnection();
        return $database->db->query('SELECT * FROM team')->fetchAll();
    }
    public function test()
    {
        require_once __DIR__ . '/../views/about.view.php';
    }
}
