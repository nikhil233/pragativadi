<?php
require('top.php');
$city_name="";
$status="";
$cat_id="";
$id="";
if(isset($_GET['id']) && $_GET['id']>0){
    $id = $crud->escape_string($_GET['id']);
    $result=$crud->getData("SELECT * from cities WHERE id=$id");
    foreach ($result as $result) {
        $city_name=$result['city_name'];
        $status=$result['status'];
        $cat_id=$result['cat_id'];
    }
}
if(isset($_POST['submit'])){
    $city_name= $crud->escape_string($_POST['city_name']);
    $status=$crud->escape_string($_POST['status']);
    $cat_id= $crud->escape_string($_POST['cat_id']);
    $added_on=date('Y-m-d h:i:s');
    if($id==""){
        $result=$crud->execute("INSERT INTO cities(cat_id,city_name,status,added_on) VALUES('$cat_id','$city_name','$status','$added_on')");
        redirect('city_list.php');
    }   
    else{
        $result= $crud->execute("UPDATE cities set cat_id='$cat_id' ,city_name='$city_name',status='$status' where id='$id' ");
        redirect('city_list.php');
    }
}
$results=$crud->getData("SELECT * from category order by id asc");
?>
<div class="row">
			<h1 class="card-title ml10">Add City</h1>
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">

                  <form class="forms-sample" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                      <label for="exampleInputName1">Category Name</label>
                        <select class="form-control" name="cat_id"  id="cat_id"  required>
                          <option value="" >Select Category</option>
                                      <?php
                                     
                                      foreach($results as $res){
                            if($res['id']==$cat_id){
                              echo "<option value='".$res['id']."' selected>".$res['cat_name']."</option>";
                            }else{
                              echo "<option value='".$res['id']."' >".$res['cat_name']."</option>";
                            }
                          }
                          ?>
                        </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">City Name</label>
                      <input type="text" class="form-control" id="exampleInputName1" placeholder="Name" name="city_name"  value="<?php echo $city_name?>" required>
                    </div>
                    
                    <div class="form-group col-md-4 ">
                      <label for="exampleSelectGender">Status</label>
                        <select class="form-control" id="exampleSelectGender"   name="status"  required title="xyz"> 
                        <?php if($status=='')
                        {?>
                          
                          <option value="1">Active</option>
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