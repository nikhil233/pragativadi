<?php
include_once("../classes/Crud.php");
$crud = new Crud();
$id =   $crud->escape_string($_POST['id']);
$result=$crud->delete( $id ,'news_map');
echo 'done';