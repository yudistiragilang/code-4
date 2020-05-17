<?php

/**
 *  desc : Controler management roles
 *  created : 15 mei 2020
 *  author : yudhistiragilang22@gmail.com
 */

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\Role_model;
use App\Models\User_model;

class Roles_maintenance extends Controller
{
	
    public function index()
    {
        $model = new Role_model();
        $data['title'] = "Roles Maintenance";
        $data['roles'] = $model->getRole();
        echo view('maintenance/role', $data);
    }
 
    public function save()
    {
        $model = new Role_model();
        $data = array(
            'role' => $this->request->getPost('roles'),
            'created_date' => date('Y-m-d H:i:s'),
        );
        $model->saveRole($data);
        return redirect()->to(base_url('/maintenance-roles'));
    }
 
    public function update()
    {
        $model = new Role_model();
        $id = $this->request->getPost('id');
        $data = array(
            'role'  => $this->request->getPost('roles'),
        );
        $model->updateRole($data, $id);
        return redirect()->to(base_url('/maintenance-roles'));
    }
	
	public function delete($id)
    {
        $usr = new User_model();
        $dataUser = $usr->cekRolesUsed($id);

        if($dataUser > 0){
            
            $session = \Config\Services::session($config);
            $session->setFlashdata('gagal', '
                <div class="alert alert-danger alert-dismissible show fade">
                  <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                      <span>&times;</span>
                    </button>
                    This is a danger alert.
                  </div>
                </div>
                ');
            return redirect()->to(base_url('/maintenance-roles'));

        }else{
            
            $model = new Role_model();
            $model->deleteRole($id);
            return redirect()->to(base_url('/maintenance-roles'));
        
        }
        
    }

}

?>