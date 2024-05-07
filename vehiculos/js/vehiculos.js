function formuNuevoVehiculo()
{
    //  alert('funcion javascript');
    const http=new XMLHttpRequest();
    const url = 'vehiculos/vehiculos.php';
    http.onreadystatechange = function(){

        if(this.readyState == 4 && this.status ==200){
               document.getElementById("modalBodyNuevoParqueadero").innerHTML  = this.responseText;
        }
    };
    http.open("POST",url);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send('opcion=formuNuevoVehiculo'
    );

}
