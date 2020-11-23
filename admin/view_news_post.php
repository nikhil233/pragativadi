<?php
require('top.php');
    if(isset($_GET['id'])){
        $id =   $crud->escape_string($_GET['id']);
        $sql=  "SELECT news_posts.id,news_posts.news_date,cities.city_name from news_posts,cities where news_posts.id=$id and cities.id=news_posts.city_id  ";
        $result=$crud->getData($sql);
    }
    else{
        $script->redirect('post_list.php');
    }
?>

<div class="row" style="margin-left:auto; margin-right:auto; background-color:#fff;">
    <style>
        p{
            font-size:20px;
        }
        .news_img{
            width:100%;
            height:auto;
        }

    </style>
        <?php 
            
            foreach ($result as $res) {
            ?>
            <div class="col-md-12 col-12">
            <h1>City Name:  <?php echo $res['city_name']?></h1>
            <p>News date:  <?php echo $res['news_date']?></p>
                <div class="row">
                <?php
                    $sqli=  "SELECT * from news_posts_image WHERE post_id=".$res['id']." order by id asc ";
                    $resulti=$crud->getData($sqli);
                    // echo "<pre>";
                    // print_r($resulti);
                    foreach($resulti as $row){

                ?>
                <div class="col-md-4 col-12">
                    <h2>Page <?php echo $row['page_no'] ?></h2>
                    <img src="<?php echo SITE_NEWS_IMAGE.$row['page_image'] ?>" alt="" class="news_img">
                    <a href="change_news_image.php?id=<?php echo $row['id'] ?>&city_name=<?php echo $res['city_name'] ?>" class="btn btn-primary"   style="padding:5px 10px;float:left;">Edit</a>
                    <a href="map_news_image.php?id=<?php echo $row['id'] ?>&city_name=<?php echo $res['city_name'] ?>"   class="btn btn-info"   style="padding:5px 10px; float:right;">Map</a>
                    
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