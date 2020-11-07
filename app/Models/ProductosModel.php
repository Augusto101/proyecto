<?php
namespace App\Models;
use CodeIgniter\Model;

/**
*
*/
class ProductosModel extends Model
{

  protected $table      = 'productos';
  protected $primaryKey = 'id';

  protected $returnType     = 'array';
  protected $useSoftDeletes = false;

  protected $allowedFields = ['codigo','nombre', 'PrecioVenta','PrecioCompra','existencias','StockMinimo',
  'inventariable','IDunidad','IDcategoria','activo'];

  protected $useTimestamps = true;
  protected $createdField  = 'FechaCreacion';
  protected $updatedField  = 'FechaModificacion';
  protected $deletedField  = 'deleted_at';

  protected $validationRules    = [];
  protected $validationMessages = [];
  protected $skipValidation     = false;

}


?>
