<?php

namespace App\Models;

use CodeIgniter\Model;

class PaketModel extends Model
{
    protected $table = 'paket';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = ['desa_id', 'name', 'price', 'description'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    public function getPaketWithDesa()
    {
        return $this->select('paket.*, desa.name as desa_name')
                    ->join('desa', 'desa.id = paket.desa_id')
                    ->findAll();
    }
}