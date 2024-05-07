<?php
$raiz = dirname(dirname(dirname(__file__)));
// require_once($raiz.'/login/views/loginView.php');  
require_once($raiz.'/vehiculos/models/VehiculoModel.php');  

class vehiculosView
{
    protected $model;
    // protected $viewPlantilla;

    public function __construct()
    {
        $this->model = new VehiculoModel();

        // if($_REQUEST['opcion']=='parqueaderoMenu'){
        //     // $this->model->traerParqueaderos();
        //     $this->view->parqueaderoMenu();
        // }    
    }
    public function vehiculosMenu()
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
                Vehiculos <button 
                            class="btn btn-warning"
                            data-bs-toggle="modal" 
                            data-bs-target="#modalNuevoParqueadero"
                            onclick="formuNuevoVehiculo();"
                            >Nuevo</button>
                <div></div>
                <div id="div_resultadosparqueadero">
                    <?php
                        $vehiculos = $this->model->traerVehiculos();
                        $this->mostrarVehiculos($vehiculos);
                    ?>
                </div>
            </div>
            <?php  $this->modalNuevoParqueadero(); ?>
        </body>
        </html>
        <?php
    }
    public function modalNuevoParqueadero()
    {
        ?>
            <!-- Modal -->
            <div class="modal fade" id="modalNuevoParqueadero" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo Vehiculo</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modalBodyNuevoParqueadero">
                    
                </div>
                <div class="modal-footer">
                    <button  type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="vehiculos();" >Cerrar</button>
                    <button  type="button" class="btn btn-primary"  id="btnEnviar"  onclick="grabarNuevoVehiculo();" >Grabar</button>
                </div>
                </div>
            </div>
            </div>

        <?php
    }
    public function mostrarVehiculos($vehiculos)
    {
        ?>
            <table class="table table-striped mt-3">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Placa</th>
                        <th>Marca</th>
                        <th>Linea</th>
                        <th>Modelo</th>
                     
                       
                    </tr>
                </thead>
                <tbody>
                    <?php
                       foreach($vehiculos as $vehiculo)
                       {
                          echo '<tr>';  
                          echo '<td>'.$vehiculo['id'].'</td>'; 
                          echo '<td>'.$vehiculo['placa'].'</td>'; 
                          echo '<td>'.$vehiculo['marca'].'</td>'; 
                          echo '<td>'.$vehiculo['linea'].'</td>'; 
                          echo '<td>'.$vehiculo['modelo'].'</td>'; 
                          echo '</tr>';  
                        }  
                    ?>
                </tbody>
            </table>

        <?php
    }


 
    public function formuNuevoVehiculo()
    {
      
        ?>
        <div class="row">
                <div class="col-md-6">
                    <label for="">Placa</label>
                      <input class ="form-control" type="text" id="nombreParqueadero">          
                </div>
                <div class="col-md-6">
                    <label for="">Marca:</label>
                      <input class ="form-control" type="text" id="direccionParqueadero">          
                </div>
                <div class="col-md-6">
                    <label for="">Linea:</label>
                      <input class ="form-control" type="text" id="telefonoParqueadero">          
                </div>
                <div class="col-md-6">
                    <label for="">Modelo:</label>
                      <input class ="form-control" type="text" id="emailParqueadero">          
                </div>
                
             
        </div>
   
   
        <?php
    }
   


}


?>