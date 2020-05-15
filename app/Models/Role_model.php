<?php

/**
 *  desc : Model management roles
 *  created : 15 mei 2020
 *  author : yudhistiragilang22@gmail.com
 */

namespace App\Models;
use CodeIgniter\Model;

class Role_model extends Model
{
    
    protected $table = 'roles';
     
    public function getRole($id = false)
    {
        if($id === false){
            return $this->findAll();
        }else{
            return $this->getWhere(['id' => $id]);
        }
    }

    public function saveRole($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }

    public function updateRole($data, $id)
    {
        $query = $this->db->table($this->table)->update($data, array('id' => $id));
        return $query;
    }

    public function deleteRole($id)
    {
        $query = $this->db->table($this->table)->delete(array('id' => $id));
        return $query;
    }
 
}

?>