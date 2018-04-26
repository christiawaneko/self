<?php

class Data
{
    function __construct($db)
    {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }

    public function GetAllData(){
        $sql = "SELECT * FROM tb_data";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();

    }
}
