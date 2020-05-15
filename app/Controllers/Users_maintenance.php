<?php

/**
 *  desc : Controler management user
 *  created : 15 mei 2020
 *  author : yudhistiragilang22@gmail.com
 */

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\User_model;

class Users_maintenance extends Controller
{
	
    public function index()
    {
        $model = new User_model();
        $data['title'] = "User Maintenance";
        $data['users'] = $model->getUser();
        echo view('maintenance/user', $data);
    }
 
    public function save()
    {
        $model = new User_model();
        $data = array(
            'nama'  => $this->request->getPost('nama'),
            'alamat' => $this->request->getPost('alamat'),
            'telepon' => $this->request->getPost('telepon'),
            'email' => $this->request->getPost('email'),
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
        );
        $model->saveUser($data);
        return redirect()->to(base_url('/maintenance-users'));
    }
 
    public function update()
    {
        $model = new User_model();
        $id = $this->request->getPost('id');
        $data = array(
            'nama'  => $this->request->getPost('nama'),
            'alamat' => $this->request->getPost('alamat'),
            'telepon' => $this->request->getPost('telepon'),
            'email' => $this->request->getPost('email'),
        );
        $model->updateUser($data, $id);
        return redirect()->to(base_url('/maintenance-users'));
    }
	
	public function delete($id)
    {
        $model = new User_model();
        $model->deleteUser($id);
        return redirect()->to(base_url('/maintenance-users'));
    }

}

?>