<?php
$raiz = dirname(dirname(dirname(__file__)));
// require_once($raiz.'/login/views/loginView.php');  
require_once($raiz.'/viajes/models/ViajeModel.php');  
require_once($raiz.'/conductores/models/ConductorModel.php');  
require_once($raiz.'/vehiculos/models/VehiculoModel.php');  

class viajesView
{
    protected $model;
    protected $conductor;
    protected $vehiculo;
    // protected $viewPlantilla;

    public function __construct()
    {
        $this->model = new ViajeModel();
        $this->conductor = new ConductorModel();
        $this->vehiculo = new VehiculoModel();

        // if($_REQUEST['opcion']=='parqueaderoMenu'){
        //     // $this->model->traerParqueaderos();
        //     $this->view->parqueaderoMenu();
        // }    
    }
    public function viajesMenu()
    {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=div, initial-scale=1.0">
            <title>Document</title>
        </head>
        <body>
            <div>
                Viajes <button 
                            class="btn btn-warning"
                            data-bs-toggle="modal" 
                            data-bs-target="#modalNuevoViaje"
                            onclick="formuNuevoViaje();"
                            >Nuevo</button>
                <div></div>
                <div id="div_resultadosparqueadero">
                    <?php
                        $viajes = $this->model->traerViajes();
                        $this->mostrarViajes($viajes);
                    ?>
                </div>
            </div>
            <?php  $this->modalNuevoViaje(); ?>
        </body>
        </html>
        <?php
    }
    public function modalNuevoViaje()
    {
        ?>
            <!-- Modal -->
            <div class="modal fade" id="modalNuevoViaje" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modalBodyNuevoViaje">
                    
                </div>
                <div class="modal-footer">
                    <button  type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="viajes();" >Cerrar</button>
                    <button  type="button" class="btn btn-primary"  id="btnEnviar"  onclick="grabarNuevoViaje();" >Grabar</button>
                </div>
                </div>
            </div>
            </div>

        <?php
    }
    public function mostrarViajes($viajes)
    {
        ?>
            <table class="table table-striped mt-3">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Vehiculo</th>
                        <th>Conductor</th>
                        <th>Fecha</th>
                        <th>Habilitado</th>
                     
                       
                    </tr>
                </thead>
                <tbody>
                    <?php
                       foreach($viajes as $viaje)
                       {
                        $infoCoductor =  $this->conductor->traerInfoCliente0Id($viaje['idConductor']); 
                        $infoVehiculo =  $this->vehiculo->traerVehiculoId($viaje['idVehiculo']);   
                          echo '<tr>';  
                          echo '<td>'.$viaje['id'].'</td>'; 
                          echo '<td>'.$viaje['nombre'].'</td>'; 
                          echo '<td>'.$infoVehiculo['placa'].'</td>'; 
                          echo '<td>'.$infoCoductor['nombre'].'</td>'; 
                          echo '<td>'.$viaje['fecha'].'</td>'; 
                          echo '<td>'.$viaje['habilitado'].'</td>'; 
                          echo '</tr>';  
                        }  
                    ?>
                </tbody>
            </table>

        <?php
    }


 
    public function formuNuevoViaje()
    {
      
        ?>
        <div class="row">
                <div class="col-md-6">
                    <label for="">Nombre Viaje</label>
                      <input class ="form-control" type="text" id="nombreViaje">          
                </div>
                <div class="col-md-6">
                    <label for="">Placa:</label>
                    <select id="idVehiculoViaje" class="form-control">
                        <option value ="">Seleccione...</option>
                        <?php
                        $vehiculos = $this->vehiculo->traerVehiculos(); 
                         foreach($vehiculos as $vehiculo)
                         {
                            echo '<option value ="'.$vehiculo['id'].'">'.$vehiculo['placa'].'</option>';     
                         }   
                        ?>
                    </select>
                      <!-- <input class ="form-control" type="text" id="nombreParqueadero">           -->
                </div>
                <div class="col-md-6">
                    <label for="">Conductor:</label>
                    <select id="idConductorViaje" class="form-control">
                        <option value ="">Seleccione...</option>
                        <?php
                        $conductores = $this->conductor->traerConductores(); 
                         foreach($conductores as $conductor)
                         {
                            echo '<option value ="'.$conductor['idcliente'].'">'.$conductor['nombre'].'</option>';     
                         }   
                        ?>
                    </select>
                      <!-- <input class ="form-control" type="text" id="direccionParqueadero">           -->
                </div>
                <!-- <div class="col-md-6">
                    <label for="">Linea:</label>
                      <input class ="form-control" type="text" id="telefonoParqueadero">          
                </div>
                <div class="col-md-6">
                    <label for="">Modelo:</label>
                      <input class ="form-control" type="text" id="emailParqueadero">          
                </div> -->
                
             
        </div>
   
   
        <?php
    }
   


}


?>