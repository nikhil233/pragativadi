<?php
require('top.php');
$cat_name="";
$status="";
$id="";
if(isset($_GET['id']) && $_GET['id']>0){
    $id = $crud->escape_string($_GET['id']);
    $result=$crud->getData("SELECT * from category WHERE id=$id");
    foreach ($result as $result) {
        $cat_name=$result['cat_name'];
    }
}
if(isset($_POST['submit'])){
    $cat_name= $crud->escape_string($_POST['cat_name']);
    $added_on=date('Y-m-d h:i:s');
    if($id==""){
        
        $sql="INSERT INTO category(added_on,cat_name) VALUES('$added_on','$cat_name')";
        $result= $crud->execute($sql);
        
        redirect('category_list.php');
    }   
    else{
        $result= $crud->execute("UPDATE category set cat_name='$cat_name' where id='$id' ");
        redirect('category_list.php');
    }
}
?>
<div class="row">
			<h1 class="card-title ml10">Add Category</h1>
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <form class="forms-sample" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="exampleInputName1">Category Name</label>
                      <input type="text" class="form-control" id="exampleInputName1" placeholder="Name" name="cat_name"  value="<?php echo $cat_name?>" required>
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