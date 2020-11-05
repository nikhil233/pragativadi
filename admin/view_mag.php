<?php
require('top.php');
    if(isset($_GET['id'])){
        $id =   $crud->escape_string($_GET['id']);
        $sql=  "SELECT magazine_posts.id,magazine_posts.mag_date,cities.city_name from magazine_posts,cities where magazine_posts.id=$id and cities.id=magazine_posts.city_id  ";
        $result=$crud->getData($sql);
    }
    else{
        $script->redirect('magazine_list.php');
    }
?>

<div class="row" style="margin-left:auto; margin-right:auto; background-color:#fff;">
    <style>
        p{
            font-size:20px;
        }
        .news_img{
            width:100%;
            height:300px;
        }

    </style>
        <?php 
            
            foreach ($result as $res) {
            ?>
            <div class="col-md-12 col-12">
            <h1>City Name:  <?php echo $res['city_name']?></h1>
            <p>Mag date:  <?php echo $res['mag_date']?></p>
                <div class="row">
                <?php
                    $sqli=  "SELECT * from magazine_post_image WHERE post_id=".$res['id']." order by id asc ";
                    $resulti=$crud->getData($sqli);
                    // echo "<pre>";
                    // print_r($resulti);
                foreach($resulti as $row){

                ?>
                <div class="col-md-4 col-12">
                    <h2>Page <?php echo $row['page_no'] ?></h2>
                    <img src="<?php echo SITE_MAGAZINE_IMAGE.$row['mag_image'] ?>" alt="" class="news_img">
                    <a href="change_mag_image.php?id=<?php echo $row['id'] ?>&city_name=<?php echo $res['city_name'] ?>">Edit</a>
                    
                </div>
                <?php
                }
                ?>
                </div>
            </div>  
        
            <?php
            }
        ?>
    </div>
<?php
require('footer.php');
?>