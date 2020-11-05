<?php
require('top.php');
if(isset($_GET['id'])){
  $id =   $crud->escape_string($_GET['id']);
  $result=$crud->delete( $id ,'cities');
  redirect('category_list.php');
}
$sql="SELECT * from category order by id desc";
$result=$crud->getData($sql);
?>

  <div class="container-fluid">
          <div class="card">
            <div class="card-body">
            <div style="display:flex; justify-content:space-between;">
              <h4 class="" style="">Category table
              
              </h4>
              <div style="text-align:right; padding:10px 0;">
              <a href="add_cat.php" class="add_link btn btn-outline-primary" >Add Category</a>
              </div>
              </div>
              <div class="row grid_box">
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                            <th width="10%"> #</th>
                            <th width="30%">Category Name</th>
                            <th width="30%" >Actions</th>
                            
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $i=1;
                        foreach ($result as $res) {
                        ?>
                        <tr>
                          <style>
                            td{
                              word-break:break-word;
                            }
                          </style>
                            <td><?php echo $i?></td>
                            <td><?php echo $res['cat_name']?></td>
                            
                            <td>
                              <a href="add_cat.php?id=<?php echo $res['id'] ?> "> <button class="btn btn-outline-primary">Edit</button></a>
                              
                              <a href="city_list.php?id=<?php echo $res['id']?>" onclick="return confirm('Are you sure to delete?')"><button class="btn btn-outline-primary ">Delete</button></a>
                            </td>
                            
                        </tr>
                        <?php
                        $i++;
                        }
                        ?>
                      </tbody>
                    </table>
                  </div>
				      </div>
              </div>
            </div>
          </div>
          </div>


<?php
require('footer.php');
?>
        