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
        $insert = $model->saveMember($data);
        if($insert) {
            session()->setFlashdata('sukses', 'Berhasil Tambah Member '.$this->request->getPost('nama'));
        } else {
            session()->setFlashdata('gagal', 'Gagal Tambah Member ! ');
        }
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
        $updated = $model->updateMember($data, $id);
        if($updated) {
            session()->setFlashdata('sukses', 'Berhasil Update Member '.$this->request->getPost('nama'));
        } else {
            session()->setFlashdata('gagal', 'Gagal Update Member ! ');
        }
        return redirect()->to(base_url('/maintenance-members'));
    }
	
	public function delete($id)
    {
        $model = new Member_model();
        $deleted = $model->deleteMember($id);
        if($deleted) {
            session()->setFlashdata('sukses', 'Berhasil Hapus Member '.$this->request->getPost('nama'));
        } else {
            session()->setFlashdata('gagal', 'Gagal Hapus Member ! ');
        }
        return redirect()->to(base_url('/maintenance-members'));
    }

    public function cekUserUsed($id_user)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('members');
        $builder->select('*');
        $builder->where('user_id', $id_user);
        $data = $builder->countAllResults();
        return $data;
    }

}

?>