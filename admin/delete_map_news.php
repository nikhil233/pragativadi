<?php
include_once("../classes/Crud.php");
$crud = new Crud();
$id =   $crud->escape_string($_POST['id']);
$result = $crud->getData("SELECT image from news_map where id=$id");
foreach((array)$result as $res){
    // echo $res['image'];
    unlink(SERVER_NEWSMAP_IMAGE.$res['image']);
}
$result=$crud->delete( $id ,'news_map');

echo 'Deleted';