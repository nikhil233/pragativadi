<?php
require('top.php');
if(isset($_GET['id'])){
    $id =  $crud->escape_string($_GET['id']);
    $sql=  "SELECT news_posts.id,news_posts.news_date,news_posts.city_id,cities.city_name from news_posts,cities where news_posts.city_id=$id and cities.id=news_posts.city_id order by news_posts.news_date DESC LIMIT 1 ";
    $result=$crud->getData($sql);
    if(isset($_GET['date'])){
        
        $date = $crud->escape_string($_GET['date']);
        
        $sql= 'SELECT news_posts.id,news_posts.news_date,news_posts.city_id,cities.city_name from news_posts,cities where  news_posts.city_id='.$id.' AND news_posts.news_date="'.$date.'" AND  cities.id=news_posts.city_id  order by news_posts.news_date DESC LIMIT 1 ';
        $result=$crud->getData($sql);
    }
    
}
else{
    // $sql=  "SELECT news_posts.id,news_posts.news_date,news_posts.city_id,cities.city_name from news_posts,cities where   cities.id=news_posts.city_id order by news_posts.news_date DESC LIMIT 1  ";
    // $result=$crud->getData($sql);
    redirect(FRONT_SITE_PATH.'index');
}

if(count($result)>0){
$nid=$result[0]['city_id'];
$present_date=$result[0]['news_date'];
$sqli=  "SELECT * from news_posts_image WHERE post_id=".$result[0]['id']." order by id asc ";
$resulti=$crud->getData($sqli);

?>


<section>
<div style="text-align:center">
  <h2><?php echo $result[0]['city_name']  ?></h2>
  
  <p><?php echo date("F j, Y ", strtotime($result[0]['news_date']));  ?></p>
</div>
<div class="container">    
    <hr>
    <h5>Pages</h5>
    <div class="row bg-light ">
        <div class="col-md-7 col-12">
        <nav class="pagen" aria-label="Page navigation example">
            <ul class="pagination main pt-3">
                <?php
                $i=1;
                $first_img='';
                foreach($resulti as $row){
                    $active='';
                    if($i==1){
                        $active='active';
                    }
                ?>
                <li class="page-item <?php echo $active?>"><button class="page-link <?php echo 'Page_'.$i ?>"   onclick="myFunction2('<?php echo SITE_NEWS_IMAGE.$row['page_image'] ?>','<?php echo 'Page '.$i ?>','<?php echo $i?>');"><?php echo $i ?></button></li>
                <?php
                    $i++;
                    }
                ?>
                
            </ul>
            
        </nav>
        </div>
       
        <div class="col-md-5 col-12">
            
        <div style="float:right; text-align:center;">
        <h5>Change Date</h5>
            <input type="date" id="dt" onchange="change_date('<?php echo $nid ?>');" value="<?php echo $present_date ?>"/>
        </div>
        </div>
    </div>
        

        <hr>

</div>
</section>


<!-- The four columns -->
<div class="container">
    
    <div class="row">
        <div class="col-md-3">
            <div class="news_pages">
               <?php
                 
                 // echo "<pre>";
                 // print_r($resulti);
                 $i=1;
                 $first_img='';
                 
                 foreach($resulti as $row){
                    $active='';
                    
                    if($i==1){
                        $first_img=$row['page_image'];
                        $active='active';
                        
                    }
                     
                    
               ?>
                <div class="column">
                    <p class="<?php echo $active?>">Page <?php echo $row['page_no'] ?></p>
                    <img src="<?php echo SITE_NEWS_IMAGE.$row['page_image'] ?>" alt=" Page <?php echo $row['page_no'] ?>" style="width:70%" onclick="myFunction(this,'<?php echo $i?>');">
                </div>
                <?php
                $i++;
                 }
                ?>
            </div>

        </div>
        <div class="col-md-9">
            <div class="container">
                <?php
                 $curStr=$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                ?>
                <section >
                    <div class="share">
                    <a href="http://www.facebook.com/share.php?u=<?php echo $curStr ?>" target="_blank"><i class="fa fa-facebook-official" aria-hidden="true"></i></a>
                    <a href="https://twitter.com/share?url=<?php echo $curStr ?>&amp;text=Pragativadi&amp;hashtags=#pragativadi" target="_blank"><i class="fa fa-twitter-square" aria-hidden="true"></i></a>
                    <a href="https://web.whatsapp.com/send?text=<?php echo $curStr ?>" target="_blank"><i class="fa fa-whatsapp" aria-hidden="true"></i></a>
                    
                    <a target="_blank" href="#" onclick="window.print(); return false;" class="shareit print">
                                <i class="fa fa-print"></i>
                    </a>
                    <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo $curStr ?>" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                    </div>
                </section>
                <h2 id="imgtext">Page 1</h2>
                
                    <h1 id="pleas"></h1>
                     <a href="<?php echo SITE_NEWS_IMAGE.$first_img ?>" id="lar_im"> <img src="<?php echo SITE_NEWS_IMAGE.$first_img ?>" id="expandedImg" style="width:100%"></a>
                   
                
                
            </div>
        </div>
    </div>


</div>
<div class="container">    
    <hr>
    <h5>Pages</h5>
    <div class="row bg-light ">
        <div class="col-md-7 col-12">
        <nav class="pagen" aria-label="Page navigation example">
            <ul class="pagination main pagination_2 pt-3">
                <?php
                $i=1;
                $first_img='';
                foreach($resulti as $row){
                    $active='';
                    if($i==1){
                        $active='active';
                    }
                ?>
                <li class="page-item <?php echo $active?>"><button class="page-link <?php echo 'Page_'.$i ?>"   onclick="myFunction2('<?php echo SITE_NEWS_IMAGE.$row['page_image'] ?>','<?php echo 'Page '.$i ?>','<?php echo $i?>');"><?php echo $i ?></button></li>
                <?php
                    $i++;
                    }
                ?>
                
            </ul>
            
        </nav>
        </div>
       
        <div class="col-md-5 col-12">
            
        <div style="margin-left:auto;float:right;">
        <h5>Change Date</h5>
            <input type="date" id="dt" onchange="change_date('<?php echo $nid ?>');" value="<?php echo $present_date ?>"/>
        </div>
        </div>
    </div>
        

        <hr>

</div>
<?php
}
else{
    echo "
    <div style='display:flex;align-items:center;justify-content:center;flex-direction:column;'>
    <img src='". FRONT_SITE_PATH."logo1.jpg' alt='logo' style='max-width:60%;' />
    <h1>Sorry , We are coming soon <a href='".FRONT_SITE_PATH."index' >click here to redirect </a></h1>
    </div>"; 
}
    require('footer.php');
?>
