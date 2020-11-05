<?php
require('top.php');

if(isset($_GET['date'])){
        
    $date = $crud->escape_string($_GET['date']);
    $sql= 'SELECT news_posts.*,cities.city_name from news_posts,cities where  news_posts.news_date="'.$date.'" AND  cities.id=news_posts.city_id  order by news_posts.id DESC  ';
    $result=$crud->getData($sql);
}
else{
    redirect('index');
}

if(count($result)>0){
$nid=$result[0]['city_id'];
$present_date=$result[0]['news_date'];
// $sqli=  "SELECT * from news_posts_image WHERE post_id=".$result[0]['id']." order by id asc ";
// $resulti=$crud->getData($sqli);

?>


<section>
<h1 class="text-primary" style="text-align:center;">LATEST-Epaper</h1>
    <div class="container">
        <div class="row posts">
        <!-- SHOW DATA -->
        <!-- </div> -->
        <?php
        foreach($result as $row){
            $sqli=  "SELECT page_image from news_posts_image WHERE post_id=".$row['id']." order by id asc LIMIT 1 ";
            $resulti=$crud->getData($sqli);
            echo '<div class="col-md-4 col-12">
            <a href="'.FRONT_SITE_PATH.'epaper_news/'.$row['city_id'].'/'.$row['news_date'].'" >
            <img class="list_img" src="'.SITE_NEWS_IMAGE.$resulti[0]['page_image'].'">
            <h2>'.$row['city_name'].'</h2>
            <p>'.$row['news_date'].'</p>
            </a>
            </div>';
        }
        ?>
    </div> 
</section>


<!-- The four columns -->

<?php
}
else{
    echo "<div style='display:flex;align-items:center;justify-content:center;flex-direction:column;'>
    <img src='". FRONT_SITE_PATH."logo1.jpg' alt='logo' style='max-width:60%;' />
    <h1>Sorry , We are coming soon <a href='".FRONT_SITE_PATH."index' >click here to redirect </a></h1>
    </div>";
}
    require('footer.php');
?>
