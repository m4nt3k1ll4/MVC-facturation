<?php
session_start();


require_once('controller/ArticuloController.php');


$controller = new ArticuloController();
$controller->main(); 

