<?php

/**
 * 
 */

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\Anggota_model;

class Anggota extends Controller
{
	
    public function index()
    {
        $model = new Anggota_model();
        $data['title'] = "Anggota List";
        $data['anggota'] = $model->getAnggota();
        echo view('anggota_view', $data);
    }

    public function add_new()
    {
        $data['title'] = "Tambah Anggota";
        echo view('add_anggota_view', $data);
    }
 
    public function save()
    {
        $model = new Anggota_model();
        $data = array(
            'nama'  => $this->request->getPost('nama'),
            'alamat' => $this->request->getPost('alamat'),
            'telepon' => $this->request->getPost('telepon'),
        );
        $model->saveAnggota($data);
        return redirect()->to(base_url('/anggota'));
    }

    public function edit($id)
    {
        $model = new Anggota_model();
        $data['title'] = "Ubah Anggota";
        $data['anggota'] = $model->getAnggota($id)->getRow();
        echo view('edit_anggota_view', $data);
    }
 
    public function update()
    {
        $model = new Anggota_model();
        $id = $this->request->getPost('id');
        $data = array(
            'nama'  => $this->request->getPost('nama'),
            'alamat' => $this->request->getPost('alamat'),
            'telepon' => $this->request->getPost('telepon'),
        );
        $model->updateAnggota($data, $id);
        return redirect()->to(base_url('/anggota'));
    }
	
	public function delete($id)
    {
        $model = new Anggota_model();
        $model->deleteAnggota($id);
        return redirect()->to(base_url('/anggota'));
    }

}

?>