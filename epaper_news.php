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
                        $id_first=$row['id'];
                    }
                ?>
                <li class="page-item <?php echo $active?>"><button class="page-link <?php echo 'Page_'.$i ?>"   onclick="myFunction2('<?php echo SITE_NEWS_IMAGE.$row['page_image'] ?>','<?php echo 'Page '.$i ?>','<?php echo $i?>','<?php echo $row['id']?>');"><?php echo $i ?></button></li>
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
                    <img src="<?php echo SITE_NEWS_IMAGE.$row['page_image'] ?>" alt=" Page <?php echo $row['page_no'] ?>" style="width:70%" onclick="myFunction(this,'<?php echo $i?>','<?php echo $row['id']?>');">
                </div>
                <?php
                $i++;
                 }
                ?>
            </div>

        </div>
        <div class="col-md-9">
            <div class="container" >
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
                    <div class="image_wrap" id="image_wrap">
                     <!-- <a href="<?php echo SITE_NEWS_IMAGE.$first_img ?>" id="lar_im"> <img src="<?php echo SITE_NEWS_IMAGE.$first_img ?>" id="expandedImg" style="width:100%"></a> -->
                     <img class="map" src="<?php echo SITE_NEWS_IMAGE.$first_img ?>" id="expandedImg"  style="max-width:100%!imporatant;"  usemap="#neews">
                     
                     <map name="neews" id="maping">
                        <?php
                            $sqln=  "SELECT * from news_map where news_im_id=$id_first ";
                            $resultn=$crud->getData($sqln);
                            // echo '<pre>';
                            // print_r($result);
                            if(count($resultn)>0){
                                foreach ((array)$resultn as $res) {
                                    ?>
                                    <area shape="rect" coords="<?php echo $res['x'].','.$res['y'].','.$res['x2'].','.$res['y2'] ?>"  href="<?php echo SITE_NEWSMAP_IMAGE.$res['image'] ?>" target="_blank" alt="news">
                                    <!-- <img src="<?php echo SITE_NEWSMAP_IMAGE.$res['image'] ?>" alt=""> -->
                                <?php
                                }
                            }
                            ?>
                        </map>  
                    </div>                             
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
                <li class="page-item <?php echo $active?>"><button class="page-link <?php echo 'Page_'.$i ?>"   onclick="myFunction2('<?php echo SITE_NEWS_IMAGE.$row['page_image'] ?>','<?php echo 'Page '.$i ?>','<?php echo $i?>','<?php echo $row['id']?>');"><?php echo $i ?></button></li>
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
 <script type="text/javascript">
    $('img[usemap]').rwdImageMaps();
    $('.map').maphilight();
    //  $("img[usemap]").mapTrifecta( {zoom: false});
    FRONT_SITE_PATH='http://127.0.0.1/news_manage/';
  function myFunction(imgs,no,id_map) {
   
    FRONT_SITE_PATH='http://127.0.0.1/news_manage/';
    var expandImg = document.getElementById("expandedImg");
    // var atag = document.getElementById("lar_im");
    
    var imgText = document.getElementById("imgtext");
    // var img_wrap =document.getElementById("image_wrap");
    
        $('#expandedImg').hide();
        $('#pleas').append('PLEASE WAIT...');
        $('#image_wrap').html('');
       
        setTimeout(function(){
            //   $('#img2').show();// or slideDown();  or fadeIn();  
            imgText.innerHTML = imgs.alt;
            expandImg.src = imgs.src;
            // atag.href=imgs.src;    
            $('#expandedImg').show();
            $('#pleas').html('');
            $('.map').css('background-image','url('+imgs.src+')');
            
            }, 1000);
            $.ajax({
                url: FRONT_SITE_PATH+"get_map.php",
                method: "POST",
                data: {'id':id_map},
                success: function (result) {
                    // var data=jQuery.parseJSON(result);
                    //console.log(result);
                    var htmll='<img class="map" src="'+imgs.src+'" id="expandedImg"  style="max-width:100%!imporatant;"  usemap="#neews">';
                        htmll+='<map name="neews" id="maping">'+result+'</map>';
                    // $('#maping').html(result);
                    // // $("img[usemap]").mapTrifecta({zoom: false});
                    $('#image_wrap').html(htmll);
                    $('img[usemap]').rwdImageMaps();
                  
                    $('.map').maphilight();
                }

            });
           
    var header = document.querySelector(".pagination");
   
    var header2 = document.querySelector(".pagination_2");
    
    var current = header.getElementsByClassName("active");
    var current2 = header2.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    current2[0].className = current2[0].className.replace(" active", "");
    var page_no = imgText.textContent;
    let note = header.querySelector('.Page_'+no);
    let note2 = header2.querySelector('.Page_'+no);
    
    note.parentNode.classList.add('active');
    note2.parentNode.classList.add('active');
    expandImg.parentElement.style.display = "block";
    }
    function myFunction2(imgs,page_no,no,id_map) {
      
        var expandImg = document.getElementById("expandedImg");
        var imgText = document.getElementById("imgtext");
        // var atag = document.getElementById("lar_im");
        imgText.innerHTML = page_no;
        $('#expandedImg').hide();
        $('#pleas').append('PLEASE WAIT...');
        $('#image_wrap').html('');
        setTimeout(function(){
        //   $('#img2').show();// or slideDown();  or fadeIn();  
        
        // expandImg.src = imgs;
        // atag.href=imgs;    
        $('#expandedImg').show();
        $('#pleas').html('');
        $('.map').css('background-image','url('+imgs+')');
        }, 1000);
        $.ajax({
            url: FRONT_SITE_PATH+"get_map.php",
            method: "POST",
            data: {'id':id_map},
         
            success: function (result) {
                // var data=jQuery.parseJSON(result);
                console.log(result);
                var htmll='<img class="map" src="'+imgs+'" id="expandedImg"  style="max-width:100%!imporatant;"  usemap="#neews">';
                    htmll+='<map name="neews" id="maping">'+result+'</map>';
                    // $('#maping').html(result);
                    // // $("img[usemap]").mapTrifecta({zoom: false});
                    $('#image_wrap').html(htmll);
                    $('img[usemap]').rwdImageMaps();
                    $('.map').maphilight();
            }

        });
        var header = document.querySelector(".pagination");
   
        var header2 = document.querySelector(".pagination_2");
        
        var current = header.getElementsByClassName("active");
        var current2 = header2.getElementsByClassName("active");
        current[0].className = current[0].className.replace(" active", "");
        current2[0].className = current2[0].className.replace(" active", "");
        var page_no = imgText.textContent;
        let note = header.querySelector('.Page_'+no);
        let note2 = header2.querySelector('.Page_'+no);
        
        note.parentNode.classList.add('active');
        note2.parentNode.classList.add('active');
        expandImg.parentElement.style.display = "block";
    }
    
</script>
<!-- <script type="text/javascript">
//   $(function(){$('.map').maphilight();});
        $('img[usemap]').rwdImageMaps();
    FRONT_SITE_PATH='http://127.0.0.1/news_manage/';
        function myFunction(imgs,no,id_map) {
   
    FRONT_SITE_PATH='http://127.0.0.1/news_manage/';
    var expandImg = document.getElementById("expandedImg");
    // var atag = document.getElementById("lar_im");
    
    var imgText = document.getElementById("imgtext");

        $('#expandedImg').hide();
        // $('.map').hide();
        $('#pleas').append('PLEASE WAIT...');
        
        setTimeout(function(){
            //   $('#img2').show();// or slideDown();  or fadeIn();  
            imgText.innerHTML = imgs.alt;
            expandImg.src = imgs.src;
            // atag.href=imgs.src;    
            $('#expandedImg').show();
            $('#pleas').html('');
            // $('.map').maphilight();
            $.ajax({
                url: FRONT_SITE_PATH+"get_map.php",
                method: "POST",
                data: {'id':id_map},
                
                success: function (result) {
                    // var data=jQuery.parseJSON(result);
                    console.log(result);
                    $('#maping').html(result);
                    
                    $('img[usemap]').rwdImageMaps();
                }

            });
            // $('.map').maphilight();
            // $('.map').show();
            }, 1000);
        
           
    var header = document.querySelector(".pagination");
   
    var header2 = document.querySelector(".pagination_2");
    
    var current = header.getElementsByClassName("active");
    var current2 = header2.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    current2[0].className = current2[0].className.replace(" active", "");
    var page_no = imgText.textContent;
    let note = header.querySelector('.Page_'+no);
    let note2 = header2.querySelector('.Page_'+no);
    
    note.parentNode.classList.add('active');
    note2.parentNode.classList.add('active');
    expandImg.parentElement.style.display = "block";
    }
    function myFunction2(imgs,page_no,no,id_map) {
      
        var expandImg = document.getElementById("expandedImg");
        var imgText = document.getElementById("imgtext");
        // var atag = document.getElementById("lar_im");
        imgText.innerHTML = page_no;
        $('#expandedImg').hide();
        $('#pleas').append('PLEASE WAIT...');
        setTimeout(function(){
        //   $('#img2').show();// or slideDown();  or fadeIn();  
        
        expandImg.src = imgs;
        // atag.href=imgs;    
        $('#expandedImg').show();
        $('#pleas').html('');
        
        $.ajax({
            url: FRONT_SITE_PATH+"get_map.php",
            method: "POST",
            data: {'id':id_map},
         
            success: function (result) {
                // var data=jQuery.parseJSON(result);
                // console.log(result);
                $('#maping').html(result);
                $('img[usemap]').rwdImageMaps();
            }

        });
            

        }, 1000);
       
        var header = document.querySelector(".pagination");
   
        var header2 = document.querySelector(".pagination_2");
        
        var current = header.getElementsByClassName("active");
        var current2 = header2.getElementsByClassName("active");
        current[0].className = current[0].className.replace(" active", "");
        current2[0].className = current2[0].className.replace(" active", "");
        var page_no = imgText.textContent;
        let note = header.querySelector('.Page_'+no);
        let note2 = header2.querySelector('.Page_'+no);
        
        note.parentNode.classList.add('active');
        note2.parentNode.classList.add('active');
        expandImg.parentElement.style.display = "block";
    }
</script> -->