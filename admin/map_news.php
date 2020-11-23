<?php
include_once("../classes/Crud.php");
include_once("../classes/DbConfig.php");
$crud = new Crud();
    // $ext = pathinfo($_FILES['croppedImage']['name'], PATHINFO_EXTENSION);

    $x=floor($_POST['x']);
    $y=floor($_POST['y']);
    $x2=$x+floor($_POST['width']);
    $y2=$y+floor($_POST['height']);
    $id=$_POST['id'];

    $date=date('Y-m-d h:i:s');
    $str=strtotime($date);
    $image = $str.'_'.rand(1111,9999).'.jpg';
    move_uploaded_file($_FILES['croppedImage']['tmp_name'],SERVER_NEWSMAP_IMAGE.$image);
    $result=$crud->execute("INSERT INTO news_map(news_im_id,image,x,y,x2,y2) VALUES('$id','$image','$x','$y','$x2','$y2')");
    echo "done";
