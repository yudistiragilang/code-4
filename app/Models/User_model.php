<?php

/**
 *  desc : Model management user
 *  created : 15 mei 2020
 *  author : yudhistiragilang22@gmail.com
 */

namespace App\Models;
use CodeIgniter\Model;

class User_model extends Model
{
    
    protected $table = 'users';
     
    public function getUser($id = false)
    {
        if($id === false){
            
            $db = \Config\Database::connect();
            $builder = $db->table('users');
            $builder->select('users.id,
                              users.username,
                              users.role_id,
                              roles.role AS role,
                              users.created_date,
                              users.last_visit,
                              users.inactive');
            $builder->join('roles', 'roles.id = users.role_id');
            $data = $builder->get()->getResultArray();
            return $data;
        
        }else{
            return $this->getWhere(['id' => $id]);
        }
    }

    public function getUserCombo($id = false)
    {
            
        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->select('*');
        $data = $builder->get()->getResultArray();
        return $data;
    }

    public function saveUser($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }

    public function updateUser($data, $id)
    {
        $query = $this->db->table($this->table)->update($data, array('id' => $id));
        return $query;
    }

    public function deleteUser($id)
    {
        $query = $this->db->table($this->table)->delete(array('id' => $id));
        return $query;
    }

    public function cekRolesUsed($id_role)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->select('*');
        $builder->where('role_id', $id_role);
        $data = $builder->countAllResults();
        return $data;
    }

    public function cekUsernameAvailable($username)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->select('*');
        $builder->where('username', $username);
        $data = $builder->countAllResults();
        return $data;
    }
 
}

?>