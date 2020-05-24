<?php

/**
 *  desc : Controler management user
 *  created : 15 mei 2020
 *  author : yudhistiragilang22@gmail.com
 */

namespace App\Controllers;

use App\Models\Member_model;
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
        $cekUsername = $model->cekUsernameAvailable($this->request->getPost('usr'));
        if($cekUsername > 0){
            session()->setFlashdata('gagal', 'Username '.$this->request->getPost('usr').' Sudah digunakan !');
            return redirect()->to(base_url('/maintenance-users'));
        }else{
            $hashPassword = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
            $data = array(
                'username'      => $this->request->getPost('usr'),
                'password'      => $hashPassword,
                'role_id'       => $this->request->getPost('role'),
                'created_date'  => date('Y-m-d H:i:s'),
            );
            $insert = $model->saveUser($data);
            if($insert) {
                session()->setFlashdata('sukses', 'Berhasil Tambah User '.$this->request->getPost('usr'));
            } else {
                session()->setFlashdata('gagal', 'Gagal Tambah User ! ');
            }
            return redirect()->to(base_url('/maintenance-users'));
        }
        
    }
 
    public function update()
    {
        $model = new User_model();
        $cekUsername = $model->cekUsernameAvailable($this->request->getPost('usr'));
        if($cekUsername > 0){
            session()->setFlashdata('gagal', 'Username '.$this->request->getPost('usr').' Sudah digunakan !');
            return redirect()->to(base_url('/maintenance-users'));
        }else{
            $id = $this->request->getPost('id');
            $data = array(
                'username'  => $this->request->getPost('usr'),
                'role_id'   => $this->request->getPost('role'),
            );
            $updated = $model->updateUser($data, $id);
            if($updated) {
                session()->setFlashdata('sukses', 'Berhasil Update User '.$this->request->getPost('usr'));
            } else {
                session()->setFlashdata('gagal', 'Gagal Update User ! ');
            }
            return redirect()->to(base_url('/maintenance-users'));
        }
        
    }
	
	public function delete($id)
    {
        $members = new Member_model();
        $dataMember = $members->cekUserUsed($id);

        if($dataMember > 0){
            $session = \Config\Services::session();
            $session->setFlashdata('gagal', 'Data tidak dapat dihapus karena sudah ada transaksi ! ');
            return redirect()->to(base_url('/maintenance-users'));
        }else{
            $model = new User_model();
            $deleted = $model->deleteUser($id);
            session()->setFlashdata('sukses', 'Data berhasil hapus');
            return redirect()->to(base_url('/maintenance-users'));
        }
        
        
    }

}

?>