<?php

/**
 *  desc : Model management products
 *  created : 16 mei 2020
 *  author : yudhistiragilang22@gmail.com
 */

namespace App\Models;
use CodeIgniter\Model;

class Product_model extends Model
{
    
    protected $table = 'products';
     
    public function getProduct($stock_id = false)
    {
        if($stock_id === false){
            return $this->findAll();
        }else{
            return $this->getWhere(['stock_id' => $stock_id]);
        }
    }

    public function saveProduct($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }

    public function updateProduct($data, $stock_id)
    {
        $query = $this->db->table($this->table)->update($data, array('stock_id' => $stock_id));
        return $query;
    }

    public function deleteProduct($stock_id)
    {
        $query = $this->db->table($this->table)->delete(array('stock_id' => $stock_id));
        return $query;
    }
 
}

?>