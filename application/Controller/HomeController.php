<?php

class HomeController extends Controller{
    public function index()
    {
        $data = $this->model('Data');
        $getData = $data->GetAllData();

        return $this->view('home/index',['data'=> $getData]);
      
    }
}