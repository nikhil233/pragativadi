<?php

include_once("./classes/Crud.php");
include_once("./classes/DbConfig.php");
include_once("./classes/functions.php");
include_once("./classes/constant.php");

// check request method
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    // if request method is not POST
    http_response_code(404);
    echo "<h1>404 Page Not found!</h1>";
    exit;
}


if(isset($_POST['page'])){
    // if get page number through post request and check it is valid number
    $page_num = filter_var($_POST['page'], FILTER_VALIDATE_INT,[
        'options' => [
            'default' => 1,
            'min_range' => 1
        ]
    ]); 
    
}else{
    
    $page_num = 1;
}
// set how much show posts in a single page
$page_limit = 9;
// Set Offset
$page_offset = $page_limit * ($page_num - 1);

function showPosts( $current_page_num, $page_limit, $page_offset){
    $crud = new Crud();
    $db = new DbConfig();
    
    // query of fetching posts
    $sql=  "SELECT news_posts.id,news_posts.news_date,news_posts.city_id,cities.city_name from news_posts,cities where  cities.id=news_posts.city_id  order by news_posts.news_date DESC LIMIT $page_limit OFFSET $page_offset  ";
    $result= $crud->getData($sql);
    
    // check database is not empty
    if(count($result) > 0){
        
        // fetching data
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
        
        // total number of posts
        $total_posts = count($crud->getData("SELECT id FROM `news_posts`"));
        
        // total number of pages
        $total_page = ceil($total_posts / $page_limit);
        // set next page number
        $next_page = $current_page_num+1; 
        // set prev page number
        $prev_page = $current_page_num-1; 
        
    
   
   
 
       
       echo "</div><ul class='pagination pagin'>";
        //showing prev button and check current page number is greater than 1
        if($current_page_num > 1){
            echo '<li class="page-item">
            <a class="page-link" href="'.$prev_page.'" aria-label="Previous">
              <span aria-hidden="true">&laquo;</span>
              <span class="sr-only">Previous</span>
            </a>
          </li>';
           //echo '<a href="" class="page_link">Prev</a>';
        }
        // show all number of pages
        for($i = 1; $i <= $total_page; $i++){
            //highlight the current page number
            if($i == $current_page_num){
                echo '<li class="page-item active"><a class="page-link" href="'.$i.'">'.$i.'</a></li>';
                //echo '<a href="'.$i.'" class="page_link active_page">'.$i.'</a>';
            }else{
                echo '<li class="page-item "><a class="page-link" href="'.$i.'">'.$i.'</a></li>';
                //echo '<a href="'.$i.'" class="page_link">'.$i.'</a>';
            }
            
        }
        // showing next button and check this is last page
        if($total_page+1 != $next_page){
            echo ' <li class="page-item">
            <a class="page-link" href="'.$next_page.'" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
              <span class="sr-only">Next</span>
            </a>
          </li>';
           //echo '<a href="'.$next_page.'" class="page_link">Next</a>';
        }
        
        echo "</ul>";  
        
    }else{
        echo "No Data found !";
    }
}
showPosts( $page_num, $page_limit, $page_offset);

?>