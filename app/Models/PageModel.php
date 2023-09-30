<?php

namespace App\Models;

use CodeIgniter\Model;

use CodeIgniter\Database\Exceptions\DatabaseException;


class PageModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'pages';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['type','content','name'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $names=['driver','vehicle','user','cancellation','about'];

    protected $types=['terms','policy','us'];


    

    public static function getPage(string $name,string $type)
    {
        $obj=new self();

        if(in_array($name, $obj->names) && in_array($type, $obj->types)):

            return $obj->where('name',$name)->where('type',$type)->first();

        else:

            return throw new DatabaseException('No Record found.');

        endif;
        
    }

    public function createOrUpdate(array $data,string $name,string $type)
    {
        if(in_array($type, $this->types) && in_array($name,$this->names)):

            $page= $this->where('type',$type)->where('name',$name)->first();

            $data['type']=strtolower($type);
            $data['name']=strtolower($name);


            if($page)
            {
                return $this->update($page['id'],$data);
            }
               return $this->insert($data);

        else:

            return throw new DatabaseException('Unable to create policy.Policy does not exist');

        endif;
    }



            
}
