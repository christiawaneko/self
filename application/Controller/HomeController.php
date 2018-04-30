<?php

class HomeController extends Controller{
    
    
    public function index()
    {
        $data = $this->model('Data');
        $getData = $data->GetAllData();

        return $this->view('home/index',['inidata'=>$getData]);
      
    }

    public function create()
    {
        echo  'aw';
    }

    public function store(Request $request)
    {
    
    }

    public function show($id)
    {

    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {
    
    }

    public function destroy($id)
    {

    }

}