<?php
namespace App\Controllers;
use App\Models\ProductosModel;
use App\Models\UnidadesModel;
use App\Models\CategoriasModel;

class Productos extends BaseController
{
  protected $productos;
  protected $reglas;

  public function __construct()
  {
    $this->productos = new ProductosModel();
    $this->unidades = new UnidadesModel();
    $this->categorias = new CategoriasModel();
    helper(['form']);

    $this->reglas = [
      'codigo' => [
        'rules' => 'required|is:unique[productos.codigo]',
        'errors'=> [
          'required' => 'El campo {field} es obligatorio.',
          'is:unique' => 'El campo {field} debe ser unico.',
        ]
      ],
      'nombre' => [
        'rules' => 'required',
        'errors'=> [
          'required' => 'El campo {field} es obligatorio.'
        ]
      ]
    ];
  }

  public function index($activo = 1){

    $productos = $this->productos->where('activo',$activo)->findAll();
    $data = ['titulo' => 'productos', 'datos' => $productos ];
    echo view('header');
    echo view('products/productos',$data);
    echo view('footer');
  }

  public function eliminados($activo = 0){

    $productos = $this->productos->where('activo',$activo)->findAll();
    $data = ['titulo' => 'Productos Eliminadas', 'datos' => $productos ];
    echo view('header');
    echo view('products/eliminados',$data);
    echo view('footer');
  }

  public function nuevo(){
    $unidades = $this->unidades->where('activo',1)->findAll();
    $categorias = $this->categorias->where('activo',1)->findAll();
    $data = ['titulo' => 'Agregar Producto','unidades'=> $unidades, 'categorias' => $categorias];
    echo view('header');
    echo view('products/nuevo',$data);
    echo view('footer');

  }

  public function insertar(){

    if ($this->request->getMethod()=="post" && $this->validate($this->reglas)) {
      $this->productos->save([
        'codigo'=> $this->request->getPost('codigo'),
        'nombre'=> $this->request->getPost('nombre'),
        'PrecioVenta'=> $this->request->getPost('PrecioVenta'),
        'PrecioCompra'=> $this->request->getPost('PrecioCompra'),
        'StockMinimo'=> $this->request->getPost('StockMinimo'),
        'inventariable'=> $this->request->getPost('inventariable'),
        'IDunidad'=> $this->request->getPost('IDunidad'),
        'IDcategoria'=> $this->request->getPost('IDcategoria')]);
        return redirect()->to(base_url().'/productos');
      } else {

        $unidades = $this->unidades->where('activo',1)->findAll();
        $categorias = $this->categorias->where('activo',1)->findAll();
        $data = ['titulo' => 'Agregar Producto','unidades'=> $unidades, 'categorias' => $categorias, 'validation' =>$this->validator];
        echo view('header');
        echo view('products/nuevo',$data);
        echo view('footer');

      }

    }

    public function editar($id){
      $unidades = $this->unidades->where('activo',1)->findAll();
      $categorias = $this->categorias->where('activo',1)->findAll();
      $producto = $this->productos->where('id', $id)->first();
      $data = [
        'titulo' => 'Editar Producto',
        'unidades'=> $unidades,
        'categorias' => $categorias,
        'producto' => $producto];
        echo view('header');
        echo view('products/editar',$data);
        echo view('footer');

      }

      public function actualizar(){

        $this->productos->update($this->request->getPost('id'),[
          'codigo'=> $this->request->getPost('codigo'),
          'nombre'=> $this->request->getPost('nombre'),
          'PrecioVenta'=> $this->request->getPost('PrecioVenta'),
          'PrecioCompra'=> $this->request->getPost('PrecioCompra'),
          'StockMinimo'=> $this->request->getPost('StockMinimo'),
          'inventariable'=> $this->request->getPost('inventariable'),
          'IDunidad'=> $this->request->getPost('IDunidad'),
          'IDcategoria'=> $this->request->getPost('IDcategoria')]);
          return redirect()->to(base_url().'/productos');
        }

        public function eliminar($id){
          $this->productos->update($id, ['activo' => 0]);
          return redirect()->to(base_url().'/productos');
        }

        public function reingresar($id){
          $this->productos->update($id, ['activo' => 1]);
          return redirect()->to(base_url().'/productos');
        }

      }
