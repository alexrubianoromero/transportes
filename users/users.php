<?php
date_default_timezone_set('America/Bogota');
$raiz = dirname(__file__);
//  die($raiz);
require_once($raiz.'/controllers/usersController.php');  
$usersController = new usersController();
?>