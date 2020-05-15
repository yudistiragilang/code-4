<?php

/**
 *  desc : Controler management user
 *  created : 15 mei 2020
 *  author : yudhistiragilang22@gmail.com
 */

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\User_model;
use App\Models\Role_model;

class Users_maintenance extends Controller
{
	
    public function index()
    {
        $model = new User_model();
        $roles = new Role_model();

        $data['title'] = "User Maintenance";
        $data['users'] = $model->getUser();
        $data['roles'] = $roles->getRole();
        echo view('maintenance/user', $data);
    }
 
    public function save()
    {
        $model = new User_model();
        $hashPassword = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
        $data = array(
            'username'      => $this->request->getPost('username'),
            'password'      => $hashPassword,
            'role_id'       => $this->request->getPost('role'),
            'created_date'  => date('Y-m-d H:i:s'),
        );
        $model->saveUser($data);
        return redirect()->to(base_url('/maintenance-users'));
    }
 
    public function update()
    {
        $model = new User_model();
        $id = $this->request->getPost('id');
        $data = array(
            'username'  => $this->request->getPost('username'),
            'role_id'   => $this->request->getPost('role'),
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