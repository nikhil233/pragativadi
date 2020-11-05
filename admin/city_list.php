<?php
require('top.php');
if(isset($_GET['id'])){
  $id =   $crud->escape_string($_GET['id']);
  $result=$crud->delete( $id ,'category');
  redirect('category_list.php');
}
$sql="SELECT cities.*,category.cat_name from cities,category where category.id=cities.cat_id order by id desc";
$result=$crud->getData($sql);
?>

  <div class="container-fluid">
          <div class="card">
            <div class="card-body">
            <div style="display:flex; justify-content:space-between;">
              <h4 class="" style="">Cities table
              
              </h4>
              <div style="text-align:right; padding:10px 0;">
              <a href="add_city.php" class="add_link btn btn-outline-primary" >Add city</a>
              </div>
              </div>
              <div class="row grid_box">
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                            <th width="10%"> #</th>
                            <th width="30%">Cat Name</th>
                            <th width="20%">City Name</th>
                            <th width="10%">Status</th>
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
                            <td><?php echo $res['city_name']?></td>
                            <td><?php echo $res['status']?></td>
                            <td>
                              <a href="add_city.php?id=<?php echo $res['id'] ?> "> <button class="btn btn-outline-primary">Edit</button></a>
                              
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
        