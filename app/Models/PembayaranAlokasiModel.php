<?php

namespace App\Models;

use App\Models\BaseModel;

class PembayaranAlokasiModel extends BaseModel
{
  // protected $DBGroup          = 'default';
  protected $table            = 'tb_pembayaran_alokasi';
  protected $primaryKey       = 'id';
  protected $useAutoIncrement = true;
  protected $returnType       = 'array';
  protected $useSoftDeletes   = false;
  protected $protectFields    = true;
  protected $allowedFields    = [
    'id_pembayaran',
    'id_transaksi_detail',
    'alokasi_nominal',
  ];

  // Dates
  protected $useTimestamps = true;
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
  public $logId = true;
}
