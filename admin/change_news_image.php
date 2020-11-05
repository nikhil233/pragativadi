<?php
require('top.php');

    if(isset($_GET['id']) && isset($_GET['city_name'])){
        
        $id =   $crud->escape_string($_GET['id']);
        $city_name =   $crud->escape_string($_GET['city_name']);
        //echo $city_name;
        $sql=  "SELECT news_posts_image.*,news_posts.news_date from news_posts_image,news_posts where   news_posts.id=news_posts_image.post_id and news_posts_image.id=$id ";
        $result=$crud->getData($sql);
    }
    else{
        redirect('post_list.php');
    }
    if(isset($_POST['submit'])){
        $news_date=$result[0]['news_date'];
        $page_no=$result[0]['page_no'];
        $type=$_FILES['image']['type'];
        if($_FILES['image']['name']!=''){
            if($type!='image/jpeg' && $type!='image/png'&& $type!='image/jpeg'){
               echo "Invalid image format";
            }else{
                $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
                $image = $city_name.'_'.'page_'.$page_no.'_'.$news_date.'_'.rand(1111,9999).'.'.$ext;
                //$image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
                move_uploaded_file($_FILES['image']['tmp_name'],SERVER_NEWS_IMAGE.$image);
                //$image_condition=", image='$image'";
                
                //$oldImageRow=mysqli_fetch_assoc(mysqli_query($con,"select image from product where id='$id'"));
                $oldImage=$result[0]['page_image'];
                unlink(SERVER_NEWS_IMAGE.$oldImage);
                $result= $crud->execute("UPDATE news_posts_image set page_image='$image'  where id='$id' ");
                redirect('post_list.php');
            }
        }
    }
    
?>
   <div class="row">
			<h1 class="card-title ml10">Add News Image for Page <?php echo $result[0]['page_no'] ?></h1>
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
              <img src="<?php echo SITE_NEWS_IMAGE.$result[0]['page_image'] ?>" alt="" width="300px">
                <div class="card-body">
                <?php
                // echo '<pre>';
                // print_r($result);
                ?>
                  <form class="forms-sample" method="post" enctype="multipart/form-data">
                     <div class="form-group">
                      <label>Page image(Please be sure you upload image in a serial order)</label>
                      <p></p>
                      <input type="file" name="image" class="form-control" >
                    </div>
                    <button type="submit" class="btn btn-primary mr-2" name="submit">Submit</button>
                    </form>
                </div>
                </div>
                </div>
                </div>
<?php
require('footer.php');
?>