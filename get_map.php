<?php
include_once("./classes/Crud.php");
include_once("./classes/DbConfig.php");

$crud = new Crud();
 $id=$_POST['id'];
 $sqln="SELECT * from news_map where news_im_id=$id"; 
 $resultn=$crud->getData($sqln); 
 $abc='';
 foreach ((array)$resultn as $res) { 
    $abc.="<area shape='rect' coords='". $res['x'].",".$res['y'].",".$res['x2'].",".$res['y2'] ."' target='_blank' href=' ".SITE_NEWSMAP_IMAGE.$res['image']."' alt='news'>";
 }
//  $arr=array('html'=>$abc);
//  echo  json_encode($arr);
echo $abc;
  ?>