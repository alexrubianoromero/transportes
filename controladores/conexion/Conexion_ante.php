<?php

class Conexion{
    private $host = "localhost";
    private $user = "";
    private $password = "";
    private $db = "";
    private $conect;

        // private $conect;

    public function __construct(){
   
    }

    public function connectMysql(){
            $conexionMysql =mysql_connect($this->host,$this->user,$this->password);
            $la_base =mysql_select_db($this->db,$conexionMysql);
            return $conexionMysql;
    }

    public function get_table_assoc($datos)
		{
		 	$arreglo_assoc='';
			$i=0;	
			while($row = mysql_fetch_assoc($datos)){		
			$arreglo_assoc[$i] = $row;
			$i++;
			}
		return $arreglo_assoc;
		}



}

?>