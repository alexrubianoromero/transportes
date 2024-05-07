function formuNuevoViaje()
{
    //  alert('funcion javascript');
    const http=new XMLHttpRequest();
    const url = 'viajes/viajes.php';
    http.onreadystatechange = function(){

        if(this.readyState == 4 && this.status ==200){
               document.getElementById("modalBodyNuevoViaje").innerHTML  = this.responseText;
        }
    };
    http.open("POST",url);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send('opcion=formuNuevoViaje'
    );

}

function grabarNuevoViaje()
{
    var valida =  validaInfoViaje();
    if(valida == '1')
    {
        var nombreViaje = document.getElementById('nombreViaje').value;
        var idVehiculoViaje = document.getElementById('idVehiculoViaje').value;
        var idConductorViaje = document.getElementById('idConductorViaje').value;
       
        const http=new XMLHttpRequest();
        const url = 'viajes/viajes.php';
        http.onreadystatechange = function(){
                if(this.readyState == 4 && this.status ==200){
                           document.getElementById("modalBodyNuevoViaje").innerHTML  = this.responseText;
                    }
                };
                http.open("POST",url);
                http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                http.send('opcion=grabarNuevoViaje'
                    +'&nombreViaje='+nombreViaje
                    +'&idVehiculoViaje='+idVehiculoViaje
                    +'&idConductorViaje='+idConductorViaje
                );
    }
}

function  validaInfoViaje()
{
    if( document.getElementById('nombreViaje').value == ''){
        alert('Por favor digitar nombre viaje');
        document.getElementById('nombreViaje').focus();
        return 0;
    }
    if( document.getElementById('idVehiculoViaje').value == ''){
        alert('Por favor escoger placa');
        document.getElementById('idVehiculoViaje').focus();
        return 0;
    }
    if( document.getElementById('idConductorViaje').value == ''){
        alert('Por favor escoger conductor');
        document.getElementById('idConductorViaje').focus();
        return 0;
    }
  
    return 1;
}
