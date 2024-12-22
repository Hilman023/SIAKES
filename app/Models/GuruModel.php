<?php

namespace App\Models;

use App\Models\BaseModel;

class GuruModel extends BaseModel
{
  // protected $DBGroup          = 'default';
  protected $table            = 'tb_guru';
  protected $primaryKey       = 'id';
  protected $useAutoIncrement = true;
  protected $returnType       = 'array';
  protected $useSoftDeletes   = false;
  protected $protectFields    = true;
  protected $allowedFields    = [
    'nama',
    'nik',
    'nama',
    'tempat_lahir',
    'tanggal_lahir',
    'jk',
    'email',
    'no_hp',
  ];

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
  protected $beforeInsert   = ['beforeInsert'];
  protected $afterInsert    = [];
  protected $beforeUpdate   = ['beforeUpdate'];
  protected $afterUpdate    = [];
  protected $beforeFind     = [];
  protected $afterFind      = [];
  protected $beforeDelete   = ['beforeDelete'];
  protected $afterDelete    = [];

  public $logName = false;
  public $logId = false;

  public $jk = [
    'L',
    'P'
  ];
}
