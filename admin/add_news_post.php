<?php
include('top.php');
$news_date=date('Y-m-d');
$city_id="";
$status="";
$id="";

if(isset($_POST['submit'])){
    $city_id=$crud->escape_string($_POST['city_id']);
    $news_date=$crud->escape_string($_POST['news_date']);
    $status=$crud->escape_string($_POST['status']);
    $added_on=date('Y-m-d h:i:s');
    $resultk=$crud->getData("SELECT * from cities where id=$city_id order by id asc");
    $errors = array();
    $uploadedFiles = array();
    $extension = array("jpeg","jpg","png","gif");
    $bytes = 1024;
    $KB = 1024;
    $totalBytes = $bytes * $KB;
    $UploadFolder = SERVER_NEWS_IMAGE;
    $counter = 0;
    $i=1;
    foreach($_FILES["files"]["tmp_name"] as $key=>$tmp_name){
      $temp = $_FILES["files"]["tmp_name"][$key];
      $name = $_FILES["files"]["name"][$key];
      $ext = pathinfo($name, PATHINFO_EXTENSION);
      $name = $resultk[0]['city_name'].'_'.'page_'.$i.'_'.$news_date.'_'.rand(1111,9999).'.'.$ext;
        if(empty($temp))
        {
          break;
        }
        $counter++;
        $UploadOk = true;
        if($_FILES["files"]["size"][$key] > $totalBytes)
        {
            $UploadOk = false;
            array_push($errors, $name." file size is larger than the 1 MB.");
        }
        if(in_array($ext, $extension) == false){
            $UploadOk = false;
            array_push($errors, $name." is invalid file type.");
        }
        if(file_exists($UploadFolder."/".$name) == true){
            $UploadOk = false;
            array_push($errors, $name." file is already exist.");
        }
        $i++; 
        
    }
    if(count($errors)==0){
      $i=1;
      foreach($_FILES["files"]["tmp_name"] as $key=>$tmp_name){
        $temp = $_FILES["files"]["tmp_name"][$key];
        $name = $_FILES["files"]["name"][$key];
        $ext = pathinfo($name, PATHINFO_EXTENSION);
        $name = $resultk[0]['city_name'].'_'.'page_'.$i.'_'.$news_date.'_'.rand(1111,9999).'.'.$ext;
        move_uploaded_file($temp,$UploadFolder."/".$name);
        array_push($uploadedFiles, $name);   
        $i++;  
      }
    }
    $pid=$crud->execute2("INSERT INTO news_posts(city_id,news_date,status,added_on) VALUES('$city_id','$news_date','$status','$added_on')");
    echo $pid;
    if($counter>0){
        if(count($errors)>0)
        {
            echo "<b>Errors:</b>";
            echo "<br/><ul>";
            foreach($errors as $error)
            {
                echo "<li>".$error."</li>";
            }
            echo "</ul><br/>";
        }
        
        else{
            echo "<b>Uploaded Files:</b>";
            echo "<br/><ul>";
            
            $i=1;
            foreach($uploadedFiles as $fileName)
            {  
              $result=$crud->execute("INSERT INTO news_posts_image(post_id,page_no,page_image) VALUES('$pid','$i','$fileName')");
              echo "<li>".$fileName."</li>";
              $i++;
            }
            echo "</ul><br/>";
            redirect('post_list.php');
            //echo count($uploadedFiles)." file(s) are successfully uploaded.";
        }                               
    }
    else{
        //echo "Please, Select file(s) to upload.";
    }
   


}
$results=$crud->getData("SELECT * from cities order by id asc");
?>
<div class="row">
			<h1 class="card-title ml10">Add News Post</h1>
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <form class="forms-sample" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="exampleInputName1">City Name</label>
                        <select class="form-control" name="city_id"  id="city_id"  required>
                          <option value="" >Select city</option>
                                      <?php
                                      echo "<pre>";
                                      print_r($results);
                                      foreach($results as $res){
                            if($res['id']==$city_id){
                              echo "<option value='".$res['id']."' selected>".$res['city_name']."</option>";
                            }else{
                              echo "<option value='".$res['id']."' >".$res['city_name']."</option>";
                            }
                          }
                          ?>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                      <label for="exampleInputName1">News Date</label>
                      <input type="date" class="form-control" id="exampleInputName1" placeholder="Name" name="news_date"  value="<?php echo $news_date?>" required>
                    </div>
                    <div class="form-group">
                      <label>Page image(Please be sure you upload image in a serial order)</label>
                      <input type="file" name="files[]" class="form-control" multiple>
                    </div>
                    <!-- <div class="form-group">
                      <label>Page2</label>
                      <input type="file" name="files[]" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Page3</label>
                      <input type="file" name="files[]" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Page4</label>
                      <input type="file" name="files[]" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Page5</label>
                      <input type="file" name="files[]" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Page6</label>
                      <input type="file" name="files[]" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Page7</label>
                      <input type="file" name="files[]" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Page8</label>
                      <input type="file" name="files[]" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Page9</label>
                      <input type="file" name="files[]" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Page10</label>
                      <input type="file" name="files[]" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Page11</label>
                      <input type="file" name="files[]" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Page12</label>
                      <input type="file" name="files[]" class="form-control">
                    </div> -->
                    <div class="form-group col-md-12 ">
                      <label for="exampleSelectGender">Status</label>
                        <select class="form-control" id="exampleSelectGender"   name="status"  required title="xyz"> 
                        <?php if($status=='')
                        {?>
                          
                          <option value="1" selected>Active</option>
                          <option value="0">Deactive</option>
                          <?php
                        }
                        else{
                            if ($status==1){
                                $sta='Active';
                            }
                            else{
                                $sta='Deactive';
                            }
                          echo "<option value='".$status."' selected disabled>".$sta."</option>";
                          ?>
                          <option value="1">Active</option>
                          <option value="0">Deactive</option>
                        <?php
                        }
                          ?>
                        </select>
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