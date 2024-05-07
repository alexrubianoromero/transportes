<?php
$raiz = dirname(dirname(dirname(__file__)));
require_once($raiz.'/vehiculos/views/vehiculosView.php'); 
require_once($raiz.'/vehiculos/models/VehiculoModel.php'); 

class vehiculosController
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

        $this->view = new vehiculosView();
        $this->model = new VehiculoModel();
        if($_REQUEST['opcion']=='vehiculosMenu'){
            // $this->model->traerParqueaderos();
            $this->view->vehiculosMenu();
        }    
        if($_REQUEST['opcion']=='formuNuevoVehiculo'){
            // $this->model->traerParqueaderos();
            $this->view->formuNuevoVehiculo();
        }    
        // if($_REQUEST['opcion']=='grabarNuevoParqueadero'){
        //      $this->grabarNuevoParqueadero($_REQUEST);
        // }    
    }

}
