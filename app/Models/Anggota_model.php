<?php

/**
 * 
 */

namespace App\Models;
use CodeIgniter\Model;

class Anggota_model extends Model
{
    
    protected $table = 'anggota';
     
    public function getAnggota($id = false)
    {
        if($id === false){
            return $this->findAll();
        }else{
            return $this->getWhere(['id' => $id]);
        }
    }

    public function saveAnggota($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }

    public function updateAnggota($data, $id)
    {
        $query = $this->db->table($this->table)->update($data, array('id' => $id));
        return $query;
    }

    public function deleteAnggota($id)
    {
        $query = $this->db->table($this->table)->delete(array('id' => $id));
        return $query;
    }
 
}

?>