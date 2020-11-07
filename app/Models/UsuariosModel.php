<?php
namespace App\Models;
use CodeIgniter\Model;

/**
*
*/
class UsuariosModel extends Model
{

  protected $table      = 'usuarios';
  protected $primaryKey = 'id';

  protected $returnType     = 'array';
  protected $useSoftDeletes = false;

  protected $allowedFields = ['usuario','password','nombre','IDrol','activo'];

  protected $useTimestamps = true;
  protected $createdField  = 'FechaCreacion';
  protected $updatedField  = 'FechaModificacion';
  protected $deletedField  = 'deleted_at';

  protected $validationRules    = [];
  protected $validationMessages = [];
  protected $skipValidation     = false;

}


?>
