<?php

/**
 *  desc : ContProductr management Products
 *  created : 15 mei 2020
 *  author : yudhistiragilang22@gmail.com
 */

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\Product_model;

class Products_maintenance extends Controller
{
	
    public function index()
    {
        $model = new Product_model();
        $data['title'] = "Products Maintenance";
        $data['products'] = $model->getProduct();
        echo view('maintenance/product', $data);
    }
 
    public function save()
    {
        $model = new Product_model();
        $data = array(
            'stock_name' => $this->request->getPost('stock_name'),
            'units' => $this->request->getPost('units'),
            'created_date' => date('Y-m-d H:i:s'),
        );
        $inserted = $model->saveProduct($data);
        if($inserted) {
            session()->setFlashdata('sukses', 'Berhasil Tambah Product '.$this->request->getPost('stock_name'));
        } else {
            session()->setFlashdata('gagal', 'Gagal Tambah Product ! ');
        }
        return redirect()->to(base_url('/maintenance-products'));
    }
 
    public function update()
    {
        $model = new Product_model();
        $stock_id = $this->request->getPost('stock_id');
        $data = array(
            'stock_name'  => $this->request->getPost('stock_name'),
            'units'  => $this->request->getPost('units'),
        );
        $updated = $model->updateProduct($data, $stock_id);
        if($updated) {
            session()->setFlashdata('sukses', 'Berhasil Update Product '.$this->request->getPost('stock_name'));
        } else {
            session()->setFlashdata('gagal', 'Gagal Update Product ! ');
        }
        return redirect()->to(base_url('/maintenance-products'));
    }
	
	public function delete($stock_id)
    {
        $model = new Product_model();
        $deleted = $model->deleteProduct($stock_id);
        if($deleted) {
            session()->setFlashdata('sukses', 'Berhasil Deleted Product');
        } else {
            session()->setFlashdata('gagal', 'Gagal Deleted Product ! ');
        }
        return redirect()->to(base_url('/maintenance-products'));
    }

}

?>