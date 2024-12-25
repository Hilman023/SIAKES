<?php

namespace App\Models;

use App\Models\BaseModel;

class TransaksiModel extends BaseModel
{
  // protected $DBGroup          = 'default';
  protected $table            = 'tb_transaksi';
  protected $primaryKey       = 'id';
  protected $useAutoIncrement = true;
  protected $returnType       = 'array';
  protected $useSoftDeletes   = false;
  protected $protectFields    = true;
  protected $allowedFields    = [
    'no_transaksi',
    'id_kategori_sub',
    'id_aktor',
    'jenis_aktor',
    'tanggal_transaksi',
    'total_nominal',
    'bayar_nominal',
    'sisa_nominal',
    'status',
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

  public $jenis_aktor = [
    'siswa',
    'guru'
  ];

  function getRekap()
  {
    $sql = "SELECT 
              subquery.no_transaksi AS no,
              subquery.debit,
              subquery.kredit,
              subquery.saldo,
              subquery.type,
              subquery.date
          FROM (
              SELECT 
                  tb_transaksi.no_transaksi AS no_transaksi,
                  CASE 
                      WHEN tb_transaksi_kategori.id = 1 THEN tb_transaksi.bayar_nominal 
                      ELSE 0 
                  END AS debit,
                  CASE 
                      WHEN tb_transaksi_kategori.id = 2 THEN tb_transaksi.bayar_nominal 
                      ELSE 0 
                  END AS Kredit,
                  @running_balance := @running_balance + 
                      (CASE 
                          WHEN tb_transaksi_kategori.id = 1 THEN tb_transaksi.bayar_nominal 
                          ELSE -tb_transaksi.bayar_nominal 
                      END) AS saldo,
                  tb_transaksi_kategori.nama AS type,
                  tb_transaksi.tanggal_transaksi AS date
              FROM tb_transaksi
              JOIN tb_transaksi_kategori_sub 
                  ON tb_transaksi.id_kategori_sub = tb_transaksi_kategori_sub.id
              JOIN tb_transaksi_kategori 
                  ON tb_transaksi_kategori_sub.id_kategori = tb_transaksi_kategori.id,
              (SELECT @running_balance := 0) AS init
              ORDER BY tb_transaksi.tanggal_transaksi
          ) AS subquery
          WHERE debit != 0 OR kredit != 0 ORDER BY date DESC";

    return $this->db->query($sql)->getResultArray();
  }
}
