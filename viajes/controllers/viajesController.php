<?php
$raiz = dirname(dirname(dirname(__file__)));
require_once($raiz.'/viajes/views/viajesView.php'); 
require_once($raiz.'/viajes/models/ViajeModel.php'); 

class viajesController
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

        $this->view = new viajesView();
        $this->model = new ViajeModel();

        if($_REQUEST['opcion']=='viajesMenu'){
            // $this->model->traerParqueaderos();
            $this->view->viajesMenu();
        }    
        if($_REQUEST['opcion']=='formuNuevoViaje'){
            // $this->model->traerParqueaderos();
            $this->view->formuNuevoViaje();
        }    
        if($_REQUEST['opcion']=='grabarNuevoViaje'){
             $this->grabarNuevoViaje($_REQUEST);
        }    
    }

    public function grabarNuevoViaje($request)
    {
        $this->model->grabarNuevoViaje($request); 
    }

}
