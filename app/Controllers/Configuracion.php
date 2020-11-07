<?php
namespace App\Controllers;
use App\Models\ConfiguracionModel;

class Configuracion extends BaseController
{
  protected $configuracion;
  protected $reglas;

  public function __construct()
  {
    $this->configuracion = new ConfiguracionModel();
    helper(['form']);

    $this->reglas = [
      'TiendaNombre' => [
        'rules' => 'required',
        'errors'=> [
          'required' => 'El campo {field} es obligatorio.'
        ]
      ],
      'TiendaRtu' => [
        'rules' => 'required',
        'errors'=> [
          'required' => 'El campo {field} es obligatorio.'
        ]
      ]
    ];
  }

  public function index($activo = 1){

    $nombre = $this->configuracion->where('nombre','TiendaNombre')->first();
    $rtu = $this->configuracion->where('nombre','TiendaRtu')->first();
    $telefono = $this->configuracion->where('nombre','TiendaTelefono')->first();
    $email = $this->configuracion->where('nombre','TiendaEmail')->first();
    $direccion = $this->configuracion->where('nombre','TiendaDireccion')->first();
    $mensaje = $this->configuracion->where('nombre','TiendaMensaje')->first();

    $data = [
      'titulo' => 'configuracion',
      'nombre' => $nombre,
      'rtu' => $rtu,
      'telefono' => $telefono,
      'email' => $email,
      'direccion' => $direccion,
      'mensaje' => $mensaje
    ];
    echo view('header');
    echo view('settings/configuracion',$data);
    echo view('footer');
  }


  public function actualizar(){

    if ($this->request->getMethod()== "post" && $this->validate($this->reglas)) {

      $this->configuracion->whereIn('nombre',['TiendaNombre'])->set(['valor' => $this->request->getPost('TiendaNombre')])->update();
      $this->configuracion->whereIn('nombre',['TiendaRtu'])->set(['valor' => $this->request->getPost('TiendaRtu')])->update();
      $this->configuracion->whereIn('nombre',['TiendaTelefono'])->set(['valor' => $this->request->getPost('TiendaTelefono')])->update();
      $this->configuracion->whereIn('nombre',['TiendaEmail'])->set(['valor' => $this->request->getPost('TiendaEmail')])->update();
      $this->configuracion->whereIn('nombre',['TiendaDireccion'])->set(['valor' => $this->request->getPost('TiendaDireccion')])->update();
      $this->configuracion->whereIn('nombre',['TiendaMensaje'])->set(['valor' => $this->request->getPost('TiendaMensaje')])->update();      

      return redirect()->to(base_url().'/configuracion');
    } else {
      return redirect()->to(base_url().'/configuracion');
    }
  }
}
