<?php
namespace App\Controllers;
use App\Models\UnidadesModel;

class Unidades extends BaseController
{
  protected $unidades;
  protected $reglas;

  public function __construct()
  {
    $this->unidades = new UnidadesModel();
    helper(['form']);

    $this->reglas = [
      'nombre' => [
        'rules' => 'required',
        'errors'=> [
          'required' => 'El campo {field} es obligatorio.'
        ]
      ],
      'NombreCorto' => [
        'rules' => 'required',
        'errors'=> [
          'required' => 'El campo {field} es obligatorio.'
        ]
      ]
    ];
  }

  public function index($activo = 1){

    $unidades = $this->unidades->where('activo',$activo)->findAll();
    $data = ['titulo' => 'unidades', 'datos' => $unidades ];
    echo view('header');
    echo view('units/unidades',$data);
    echo view('footer');
  }

  public function eliminados($activo = 0){

    $unidades = $this->unidades->where('activo',$activo)->findAll();
    $data = ['titulo' => 'Unidades Eliminadas', 'datos' => $unidades ];
    echo view('header');
    echo view('units/eliminados',$data);
    echo view('footer');
  }

  public function nuevo(){
    $data = ['titulo' => 'Agregar Unidad'];
    echo view('header');
    echo view('units/nuevo',$data);
    echo view('footer');

  }

  public function insertar(){

    if ($this->request->getMethod()== "post" && $this->validate($this->reglas)) {

      $this->unidades->save(['nombre'=> $this->request->getPost('nombre'), 'NombreCorto' =>
      $this->request->getPost('NombreCorto')]);
      return redirect()->to(base_url().'/unidades');
    } else {

      $data = ['titulo' => 'Agregar Unidad', 'validation' =>$this->validator];
      echo view('header');
      echo view('units/nuevo',$data);
      echo view('footer');

    }
  }

  public function editar($id, $valid=null){

    $unidad = $this->unidades->where('id',$id)->first();

    if($valid!=null){
      $data = ['titulo' => 'Editar Unidad', 'datos' =>$unidad, 'validation'  => $valid];
    }
    else {
      $data = ['titulo' => 'Editar Unidad', 'datos' =>$unidad];
    }

    echo view('header');
    echo view('units/editar',$data);
    echo view('footer');

  }

  public function actualizar(){

    if ($this->request->getMethod()== "post" && $this->validate($this->reglas)) {

      $this->unidades->update($this->request->getPost('id'), ['nombre' =>
      $this->request->getPost('nombre'),'NombreCorto' =>
      $this->request->getPost('NombreCorto')]);
      return redirect()->to(base_url().'/unidades');
    } else {
      return $this->editar($this->request->getPost('id'),$this->validator);
    }
  }

  public function eliminar($id){
    $this->unidades->update($id, ['activo' => 0]);
    return redirect()->to(base_url().'/unidades');
  }

  public function reingresar($id){
    $this->unidades->update($id, ['activo' => 1]);
    return redirect()->to(base_url().'/unidades');
  }

}
