
<?php

class Controller extends Database
{
    public function view($file, $data = [])
    {
        require_once APP. 'View/'.$file.'.php';
    }

    public function model($file)
    {
        require_once APP. 'Model/'.$file.'.php';

        return $file = new $file($this->db);
    }
}
