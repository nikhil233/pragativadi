<?php
include_once("./classes/Crud.php");
include_once("./classes/DbConfig.php");
include_once("./classes/functions.php");
include_once("./classes/constant.php");
$crud = new Crud();
$db = new DbConfig();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-paper</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo FRONT_SITE_PATH?>css/style.css">
</head>
<body>
    <main role="main">
    <div class="container">
    <section>
        <div class="container-fluid ">
            <div class="logo_con">
                <a href="<?php echo FRONT_SITE_PATH?>"><img src="<?php echo FRONT_SITE_PATH?>logo1.jpg" alt="" class="logo"></a>
                <a href="<?php echo FRONT_SITE_PATH?>avimat_list"><img src="<?php echo FRONT_SITE_PATH?>AVIMATLOGO_NEW.png" alt="" class="logo"></a>
            </div>
        </div>
        <div class="container-fluid bg-primary nnaavv">
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
                    <ul class="navbar-nav">
                    <?php 
                        $sql="SELECT id,cat_name from category order by id desc ";
                        $result=$crud->getData($sql);
                        $i=1;
                        foreach ($result as $res) {
                            $active='';
                            if($i==1){
                                $active='active';
                            }

                    ?>
                        <li class="nav-item ">
                            <a class="nav-link active" href="<?php echo FRONT_SITE_PATH?>edition.php?id=<?php echo $res['id']?>"><?php echo $res['cat_name']?></a>
                        </li>
                    <?php
                        $i++;
                        }
                    ?>
                        
                    </ul>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item ">
                        <input type="button" id="dp1" class="span2 datepicker"   name="date" style="position:relative; visibility:hidden; height:0px;"> 
                         <button class="btn btn-dark" id="startdate">Archive</button>
                         
                         <span class="input-group-addon"></span>
                        
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Category
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php 
                                $sql="SELECT id,cat_name from category order by id desc";
                                $result=$crud->getData($sql);
                                $i=1;
                                foreach ($result as $res) {
                                    $active='';
                                    if($i==1){
                                        $active='active';
                                    }

                            ?>
                            <a class="dropdown-item" href="<?php echo FRONT_SITE_PATH?>edition.php?id=<?php echo $res['id']?>"><?php echo $res['cat_name']?></a>
                            <?php
                                $i++;
                                }
                            ?>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?php echo FRONT_SITE_PATH?>avimat_list">Avimat</a>
                            </div>
                        </li>
                    </ul>
                </div>
                
            </nav>
        </div>
    </section>
    
    

