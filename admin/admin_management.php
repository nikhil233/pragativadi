<?php
include('top.php');
if(isset($_GET['type']) && $_GET['type']!=''){
	$type= $crud->escape_string($_GET['type']);
	if($type=='status'){
		$operation= $crud->escape_string($_GET['operation']);
		$id= $crud->escape_string($_GET['id']);
		if($operation=='active'){
			$status='1';
		}else{
			$status='0';
		}
		$update_status_sql="update admin set status='$status' where id='$id'";
		$result= $crud->execute($update_status_sql);
	}
	
	if($type=='delete'){
		$id=$crud->escape_string($_GET['id']);
		$result=$crud->delete( $id ,'admin');
		// $delete_sql="delete from admin where id='$id'";
		redirect('admin_management.php');
		
	}
}

$sql="select * from admin  order by id desc";
$result=$crud->getData($sql);
?>
<div class="content pb-0">
	<div class="orders">
	   <div class="row">
		  <div class="col-xl-12">
			 <div class="card">
				<div class="card-body">
				   <h4 class="box-title">Admin Management </h4>
				   <h4 class="box-link"><a href="manage_admin_management.php">Add Admin</a> </h4>
				</div>
				<div class="card-body--">
				   <div class="table-stats table-responsive order-table ov-h">
					  <table class="table ">
						 <thead>
							<tr>
							   <th class="serial">#</th>
							   <th width="2%">ID</th>
							   <th width="20%">Username</th>
							   <th width="20%">Password</th>
							   <th width="30%">Email</th>
							   
							   <th width="26%"></th>
							</tr>
						 </thead>
						 <tbody>
							<?php 
							$i=1;
							foreach ($result as $res) {?>
							<tr>
							   <td class="serial"><?php echo $i?></td>
							   <td><?php echo $res['id']?></td>
							   <td><?php echo $res['username']?></td>
							   <td><?php echo $res['password']?></td>
							   <td><?php echo $res['email']?></td>
							   
							  
							   <td>
								<?php
								if($res['status']==1){
									echo "<span class='badge badge-complete'><a href='?type=status&operation=deactive&id=".$res['id']."'>Active</a></span>&nbsp;";
								}else{
									echo "<span class='badge badge-pending'><a href='?type=status&operation=active&id=".$res['id']."'>Deactive</a></span>&nbsp;";
								}
								echo "<span class='badge badge-edit'><a href='manage_admin_management.php?id=".$res['id']."'>Edit</a></span>&nbsp;";
								
								echo "<span class='badge badge-delete'><a href='?type=delete&id=".$res['id']."' onclick='return confirm(Are you sure to delete?)' >Delete</a></span>";
								
								?>
							   </td>
							</tr>
							<?php } ?>
						 </tbody>
					  </table>
				   </div>
				</div>
			 </div>
		  </div>
	   </div>
	</div>
</div>
<?php
include('footer.php');
?>