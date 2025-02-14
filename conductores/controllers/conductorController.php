<?php
$raiz = dirname(dirname(dirname(__file__)));
require_once($raiz.'/conductores/views/conductorView.php'); 
require_once($raiz.'/conductores/models/ConductorModel.php'); 

class conductorController
{
    protected $view;
    protected $model;
    // protected $viewPlantilla;

    public function __construct()
    {
        session_start();
        if(!isset($_SESSION['id_usuario']) || $_SESSION['id_usuario']=='')
        {
            echo 'la sesion ha caducado';
            echo '<button class="btn btn-primary" onclick="irPantallaLogueo();">Continuar</button>';
            die();
        }
        // echo 'controlador usuario';
        $this->view = new conductorView();
        $this->model = new ConductorModel();

        if($_REQUEST['opcion']=='conductoresMenu'){
            // $this->model->traerParqueaderos();
            $this->view->conductoresMenu();
        }    
        if($_REQUEST['opcion']=='pedirInfoConductorNuevo'){
            $this->view->pedirInfoConductorNuevo();
        }
        // if($_REQUEST['opcion']=='grabarNuevoUsuario'){
        //     // $this->model->traerParqueaderos();
        //     // echo '<pre>'; 
        //     // print_r($_REQUEST); 
        //     // echo '</pre>';
        //     // die();
        //     $this->grabarNuevoUsuario($_REQUEST);
        // }    
        // if($_REQUEST['opcion']=='grabarNuevoParqueadero'){
        //      $this->grabarNuevoParqueadero($_REQUEST);
        // }

        // if($_REQUEST['opcion']=='cambiarClave'){
        //     // echo '<pre>'; print_r($_REQUEST) ;echo '</pre>';
        //     $this->view->cambiarClave();
        // }
        // if($_REQUEST['opcion']=='formuCambiarParqueaderoUsuario'){
        //     // echo '<pre>'; print_r($_REQUEST) ;echo '</pre>';
        //     $this->view->formuCambiarParqueaderoUsuario($_REQUEST['idUsuario']);
        // }
        
        // if($_REQUEST['opcion']=='realizarCambiarClave'){
        //     // echo '<pre>'; print_r($_REQUEST) ;echo '</pre>';
        //     $this->realizarCambiarClave($_REQUEST);
        // } 
        // if($_REQUEST['opcion']=='actualizarParqueaderoUsuario'){
        //     // echo '<pre>'; print_r($_REQUEST) ;echo '</pre>';
        //     $this->actualizarParqueaderoUsuario($_REQUEST);
        // } 
    }

    public function grabarNuevoUsuario($request)
    {
        $this->model->grabarNuevoUsuario($request);
        echo 'Informacion grabada';
    }

    public function realizarCambiarClave($request)
    {
        $validarClaveActual =  $this->model->validarClaveActual($request);
        if($validarClaveActual == 1)
        {
            $this->model->actualizarClaveUsuario($request); 
            echo 'clave actualizada'; 
        }
        else{
            echo 'Clave anterior no es correcta'; 
        }
        // die('valor de valida clave actual '.$validarClaveActual); 
        // $this->view->usersMenu($users);
    }

    public function actualizarParqueaderoUsuario($request)
    {
        $this->model->actualizarParqueaderoUsuario($request);
        echo 'Se actualizo el parqueadero del usuario '; 
    }
    

}