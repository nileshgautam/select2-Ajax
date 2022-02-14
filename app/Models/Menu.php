<?php

namespace App\Models;

use CodeIgniter\Model;

class Menu extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'menus';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getMenusList($title = null, $limit = 5)
    {

        $menus=[];
        $db = \Config\Database::connect();
        $builder = $db->table($this->table);
        $builder->limit($limit);
        if($title== null){
            $menus = $builder->get();
        }else{
            $menus = $builder->like('title', $title)->get();
        }
        if ($menus->getResultArray() > 0) {
            return $menus->getResultArray();
        }
    
    }
}
