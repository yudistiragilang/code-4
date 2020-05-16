<?php

/**
 *  desc : Controler management members
 *  created : 15 mei 2020
 *  author : yudhistiragilang22@gmail.com
 */

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\Member_model;
use App\Models\User_model;

class Members_maintenance extends Controller
{
	
    public function index()
    {
        $model = new Member_model();
        $usr = new User_model();
        $data['title'] = "Members Maintenance";
        $data['members'] = $model->getMember();
        $data['users'] = $usr->getUserCombo();
        echo view('maintenance/member', $data);
    }
 
    public function save()
    {
        $model = new Member_model();
        $hashPassword = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
        $data = array(
            'nama'  => $this->request->getPost('nama'),
            'tanggal_lahir'  => $this->request->getPost('tgl_lahir'),
            'tempat_lahir'  => $this->request->getPost('tmpt_lahir'),
            'jenis_kelamin'  => $this->request->getPost('jk'),
            'telepon' => $this->request->getPost('telepon'),
            'alamat' => $this->request->getPost('alamat'),
            'email' => $this->request->getPost('email'),
            'user_id' => $this->request->getPost('user_id'),
        );
        $model->saveMember($data);
        return redirect()->to(base_url('/maintenance-members'));
    }
 
    public function update()
    {
        $model = new Member_model();
        $id = $this->request->getPost('id');
        $data = array(
            'nama'  => $this->request->getPost('nama'),
            'tanggal_lahir'  => $this->request->getPost('tgl_lahir'),
            'tempat_lahir'  => $this->request->getPost('tmpt_lahir'),
            'jenis_kelamin'  => $this->request->getPost('jk'),
            'telepon' => $this->request->getPost('telepon'),
            'alamat' => $this->request->getPost('alamat'),
            'email' => $this->request->getPost('email'),
            'user_id' => $this->request->getPost('user_id'),
        );
        $model->updateMember($data, $id);
        return redirect()->to(base_url('/maintenance-members'));
    }
	
	public function delete($id)
    {
        $model = new Member_model();
        $model->deleteMember($id);
        return redirect()->to(base_url('/maintenance-members'));
    }

}

?>