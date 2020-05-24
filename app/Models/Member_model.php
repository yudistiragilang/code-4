<?php

/**
 *  desc : Model management members
 *  created : 15 mei 2020
 *  author : yudhistiragilang22@gmail.com
 */

namespace App\Models;
use CodeIgniter\Model;

class Member_model extends Model
{
    
    protected $table = 'members';
     
    public function getMember($id = false)
    {
        if($id === false){
            // return $this->findAll();

            $db = \Config\Database::connect();
            $builder = $db->table('members');
            $builder->select('members.*, users.username AS username');
            $builder->join('users', 'users.id = members.user_id');
            $data = $builder->get()->getResultArray();
            return $data;

        }else{
            return $this->getWhere(['id' => $id]);
        }
    }

    public function saveMember($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }

    public function updateMember($data, $id)
    {
        $query = $this->db->table($this->table)->update($data, array('id' => $id));
        return $query;
    }

    public function deleteMember($id)
    {
        $query = $this->db->table($this->table)->delete(array('id' => $id));
        return $query;
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