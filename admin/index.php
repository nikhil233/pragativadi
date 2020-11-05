<?php
require('top.php');
?>

<div class="container-fluid">
          <div class="card">
            <div class="card-body">
            <div style="display:flex; justify-content:space-between;">
              <h4 class="" style="">News Posts table
              
              </h4>
              <div style="text-align:right; padding:10px 0;">
              <a href="add_news_post.php" class="add_link btn btn-outline-primary" >Add Posts</a>
              </div>
              </div>
              <div class="row grid_box">
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                            <th width="10%"> #</th>
                            <th width="30%">City Name</th>
                            <th width="20%">Date</th>
                            <th width="10%">Status</th>
                            <th width="30%" >Actions</th>
                            
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $i=1;
                        $sql="SELECT news_posts.id,news_posts.news_date,news_posts.status,cities.city_name from news_posts,cities where cities.id=news_posts.city_id order by news_posts.id desc LIMIT 5";
                        $result=$crud->getData($sql);
                        foreach ((array)$result as $res) {
                        ?>
                            <tr>
                            <style>
                                td{
                                word-break:break-word;
                                }
                            </style>
                                <td><?php echo $i?></td>
                                <td><?php echo $res['city_name']?></td>
                                <td><?php echo $res['news_date']?></td>
                                <td><?php echo $res['status']?></td>
                                <td>
                                <a href="view_news_post.php?id=<?php echo $res['id'] ?> "> <button class="btn btn-outline-primary">View</button></a>
                                <!-- <a href="add_news_post.php?id=<?php echo $res['id'] ?> "> <button class="btn btn-outline-primary">Edit</button></a> -->
                                <a href="post_list.php?id=<?php echo $res['id']?>" onclick="return confirm('Are you sure to delete?')"><button class="btn btn-outline-primary ">Delete</button></a>
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


<div class="container-fluid mt-5">
          <div class="card">
            <div class="card-body">
            <div style="display:flex; justify-content:space-between;">
              <h4 class="" style="">Magazine Posts table(Avimat)

              
              </h4>
              <div style="text-align:right; padding:10px 0;">
              <a href="add_magazine.php" class="add_link btn btn-outline-primary" >Add Magazine Posts</a>
              </div>
              </div>
              <div class="row grid_box">
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                            <th width="10%"> #</th>
                            <th width="30%">City Name</th>
                            <th width="20%">Date</th>
                            <th width="10%">Status</th>
                            <th width="30%" >Actions</th>
                            
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $sql="SELECT magazine_posts.id,magazine_posts.mag_date,magazine_posts.status,cities.city_name from magazine_posts,cities where cities.id=magazine_posts.city_id order by magazine_posts.id desc LIMIT 5";
                        $result=$crud->getData($sql);
                        $i=1;
                        
                        foreach ((array)$result as $res) {
                        ?>
                            <tr>
                            <style>
                                td{
                                word-break:break-word;
                                }
                            </style>
                                <td><?php echo $i?></td>
                                <td><?php echo $res['city_name']?></td>
                                <td><?php echo $res['mag_date']?></td>
                                <td><?php echo $res['status']?></td>
                                <td>
                                <a href="view_mag.php?id=<?php echo $res['id'] ?> "> <button class="btn btn-outline-primary">View</button></a>
                                <!-- <a href="add_magazine.php?id=<?php echo $res['id'] ?> "> <button class="btn btn-outline-primary">Edit</button></a> -->
                                <a href="magazine_list.php?id=<?php echo $res['id']?>" onclick="return confirm('Are you sure to delete?')"><button class="btn btn-outline-primary ">Delete</button></a>
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
          
