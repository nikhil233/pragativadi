<?php
include('top.php');
$mag_date="";
$city_id="";
$status="";
$id="";
if(isset($_GET['id']) && $_GET['id']>0){
    $id = $crud->escape_string($_GET['id']);
    $result=$crud->getData("SELECT magazine_posts.*,cities.city_name from magazine_posts,cities WHERE magazine_posts.id=$id and cities.id=magazine_posts.city_id ");
    foreach ($result as $result) {
        $city_name=$result['city_name'];
        $city_id=$result['city_id'];
        $mag_date=$result['mag_date'];
        $status=$result['status'];
    }

}

if(isset($_POST['submit'])){
    $city_id=$crud->escape_string($_POST['city_id']);
    $mag_date=$crud->escape_string($_POST['mag_date']);
    $status=$crud->escape_string($_POST['status']);
    $result= $crud->execute("UPDATE magazine_posts set city_id='$city_id' ,mag_date='$mag_date',status='$status' where id='$id' ");
    redirect('post_list.php');
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
                      <input type="date" class="form-control" id="exampleInputName1" placeholder="Name" name="mag_date"  value="<?php echo $mag_date?>" required>
                    </div>
                    
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
                          echo "<option value='".$status."' selected >".$sta."</option>";
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
