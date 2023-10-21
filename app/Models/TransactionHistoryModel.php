<?php

namespace App\Models;

use CodeIgniter\Model;

use CodeIgniter\Database\Exceptions\DatabaseException;


class TransactionHistoryModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'transactions_history';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['model_id','model','transaction_id','amount','transaction_type','service_detail','note','type','status'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
  

  public static function create($transaction)
  {
     $obj=new self();

     $th=$obj->insert($transaction);

     if($th):

        return $th;

    else:

        throw new DatabaseException('Unable to insert the transaction history.Please try again later.');

    endif;


  }
}
