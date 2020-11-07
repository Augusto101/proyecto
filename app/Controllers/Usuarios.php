<?php
namespace App\Controllers;
use App\Models\UsuariosModel;
use App\Models\RolesModel;

class Usuarios extends BaseController
{
  protected $usuarios,$roles;
  protected $reglas,$reglasLogin,$reglasCambio, $reglasEdit;

  public function __construct()
  {
    $this->usuarios = new UsuariosModel();
    $this->roles = new RolesModel();
    helper(['form']);

    $this->reglas = [
      'usuario' => [
        'rules' => 'required|is_unique[usuarios.usuario]',
        'errors'=> [
          'required' => 'El campo {field} es obligatorio.',
          'is_unique' => 'El campo {field} debe ser unico.',
        ]
      ],
      'password' => [
        'rules' => 'required',
        'errors'=> [
          'required' => 'El campo {field} es obligatorio.'
        ]
      ],
      'repassword' => [
        'rules' => 'required|matches[password]',
        'errors'=> [
          'required' => 'El campo {field} es obligatorio.',
          'matches' => 'las claves no coinciden.'
        ]
      ],
      'nombre' => [
        'rules' => 'required',
        'errors'=> [
          'required' => 'El campo {field} es obligatorio.',
        ]
      ],
      'IDrol' => [
        'rules' => 'required',
        'errors'=> [
          'required' => 'El campo {field} es obligatorio.',
        ]
      ]
    ];

    $this->reglasLogin = [
      'usuario' => [
        'rules' => 'required',
        'errors'=> [
          'required' => 'El campo {field} es obligatorio.'
        ]
      ],
      'password' => [
        'rules' => 'required',
        'errors'=> [
          'required' => 'El campo {field} es obligatorio.'
        ]
      ]
    ];

    $this->reglasCambio = [
      'password' => [
        'rules' => 'required',
        'errors'=> [
          'required' => 'El campo {field} es obligatorio.'
        ]
      ],
      'repassword' => [
        'rules' => 'required|matches[password]',
        'errors'=> [
          'required' => 'El campo {field} es obligatorio.',
          'matches' => 'las claves no coinciden.'
        ]
      ]
    ];

    $this->reglasEdit = [
      'usuario' => [
        'rules' => 'required',
        'errors'=> [
          'required' => 'El campo {field} es obligatorio.'
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

    $usuarios = $this->usuarios->where('activo',$activo)->findAll();
    $data = ['titulo' => 'usuarios', 'datos' => $usuarios ];
    echo view('header');
    echo view('users/usuarios',$data);
    echo view('footer');
  }

  public function eliminados($activo = 0){

    $usuarios = $this->usuarios->where('activo',$activo)->findAll();
    $data = ['titulo' => 'Usuarios Eliminadas', 'datos' => $usuarios ];
    echo view('header');
    echo view('users/eliminados',$data);
    echo view('footer');
  }

  public function nuevo(){

    $roles = $this->roles->where('activo',1)->findAll();
    $data = ['titulo' => 'Agregar Usuario', 'roles' => $roles];
    echo view('header');
    echo view('users/nuevo',$data);
    echo view('footer');

  }

  public function insertar(){

    if ($this->request->getMethod()== "post" && $this->validate($this->reglas)) {

      $hash = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
      $this->usuarios->save([
        'usuario'=> $this->request->getPost('usuario'),
        'password' => $hash,
        'nombre'=> $this->request->getPost('nombre'),
        'IDrol'=> $this->request->getPost('IDrol'),
        'activo'=> 1]);

        return redirect()->to(base_url().'/usuarios');
      } else {

        $roles = $this->roles->where('activo',1)->findAll();
        $data = ['titulo' => 'Usuarios',  'roles' => $roles,'validation' =>$this->validator];
        echo view('header');
        echo view('users/nuevo',$data);
        echo view('footer');

      }
    }

    public function editar($id, $valid=null){

      $usuario = $this->usuarios->where('id',$id)->first();

      if($valid!=null){
        $data = ['titulo' => 'Editar Usuario', 'datos' =>$usuario, 'validation'  => $valid];
      }
      else {
        $data = ['titulo' => 'Editar Usuario', 'datos' =>$usuario];
      }

      echo view('header');
      echo view('users/editar',$data);
      echo view('footer');

    }

    public function actualizar(){

      if ($this->request->getMethod()== "post" && $this->validate($this->reglasEdit)) {

        $this->usuarios->update($this->request->getPost('id'), [
          'usuario' => $this->request->getPost('usuario'),
          'nombre' => $this->request->getPost('nombre')]);
        return redirect()->to(base_url().'/usuarios');
      } else {
        return $this->editar($this->request->getPost('id'),$this->validator);
      }
    }

    public function eliminar($id){
      $this->usuarios->update($id, ['activo' => 0]);
      return redirect()->to(base_url().'/usuarios');
    }

    public function reingresar($id){
      $this->usuarios->update($id, ['activo' => 1]);
      return redirect()->to(base_url().'/usuarios');
    }

    public function login(){
      echo view('login');
    }

    public function valida(){

      if ($this->request->getMethod()== "post" && $this->validate($this->reglasLogin)) {

        $usuario = $this->request->getPost('usuario');
        $password = $this->request->getPost('password');
        $datosUsuario = $this->usuarios->where('usuario', $usuario)->first();

        if ($datosUsuario != null) {
          if (password_verify($password,$datosUsuario['password'])) {
            $datosSesion = [
              'IDusuario' => $datosUsuario['id'],
              'nombre' => $datosUsuario['nombre'],
              'IDrol' => $datosUsuario['IDrol']
            ];

            $session = session();
            $session->set($datosSesion);
            return redirect()->to(base_url().'/configuracion');

          }  else {
            $data['error'] = "las claves no coinciden.";
            echo view('login',$data);
          }
        } else {
          $data['error'] = "El usuario no existe";
          echo view('login',$data);
        }
      } else {
        $data = ['validation' => $this->validator];
        echo view('login',$data);
      }
    }

    public function logout(){
      $session = session();
      $session->destroy();
      return redirect()->to(base_url());
    }

    public function cambiaPassword(){
      $session = session();
      $usuario = $this->usuarios->where('id',$session->IDusuario)->first();
      $data = ['titulo'=> 'cambiar password', 'usuario'=> $usuario];

      echo view('header');
      echo view('users/cambiarPassword',$data);
      echo view('footer');
    }

    public function actualizarPasswordt(){
      if ($this->request->getMethod()== "post" && $this->validate($this->reglasCambio)) {

        $session = session();
        $IDusuario = $session->$IDusuario;
        $hash = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);

        $this->usuarios->update($IDusuario, ['password' => $hash]);

        $usuario = $this->usuarios->where('id',$session->IDusuario)->first();
        $data = ['titulo'=> 'cambiar password', 'usuario'=> $usuario, 'mensaje' => 'Contraseña actualizada'];

        echo view('header');
        echo view('users/cambiarPassword',$data);
        echo view('footer');

      } else {

        $session = session();
        $usuario = $this->usuarios->where('id',$session->IDusuario)->first();
        $data = ['titulo'=> 'cambiar password', 'usuario'=> $usuario];

        echo view('header');
        echo view('users/cambiarPassword',$data);
        echo view('footer');
      }
    }

  }
