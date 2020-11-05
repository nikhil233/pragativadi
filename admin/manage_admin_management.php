<?php
include('top.php');

$username='';
$password='';
$email='';
$msg='';
if(isset($_GET['id']) && $_GET['id']!=''){
	
	$id = $crud->escape_string($_GET['id']);
	$res=$crud->getData("select * from admin where id='$id'");
	$check=count($res);
	if($check>0){
		
		$username=$res[0]['username'];
		$email=$res[0]['email'];
		$password=$res[0]['password'];
	}else{
		redirect('admin_management.php');
		die();
	}
}

if(isset($_POST['submit'])){
	$username=$crud->escape_string($_POST['username']);
	$email=$crud->escape_string($_POST['email']);
	$password=$crud->escape_string($_POST['password']);
	$res=$crud->getData("select * from admin where email='$email'");
	$check=count($res);
	if($check>0){
		if(isset($_GET['id']) && $_GET['id']!=''){
			$getData=$res[0];
			if($id==$getData['id']){
			
			}else{
				$msg="Username already exist";
			}
		}else{
			$msg="Username already exist";
		}
	}
	
	
	if($msg==''){
		if(isset($_GET['id']) && $_GET['id']!=''){
			echo "kl";
			$result= $crud->execute("update admin set username='$username',email='$email' where id='$id'");
			
		}else{
			echo "k";
			$script->register($username,$email,$password);
		}
		redirect('admin_management.php');
		die();
	}
}
?>
<div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Admin Management</strong><small> Form</small></div>
                        <form method="post" enctype="multipart/form-data">
							<div class="card-body card-block">
							   
								
								<div class="form-group">
									<label for="username" class=" form-control-label">Username</label>
									<input type="text" name="username" placeholder="Enter username" class="form-control" required value="<?php echo $username?>">
								</div>
								<?php
									if(!isset($_GET['id'])){
								 ?>
								<div class="form-group">
									<label for="password" class=" form-control-label">Password</label>
									<input type="text" name="password" placeholder="Enter password" class="form-control" required value="<?php echo $password?>">
								</div>
									<?php }?>
								<div class="form-group">
									<label for="password" class=" form-control-label">Email</label>
									<input type="email" name="email" placeholder="Enter email" class="form-control" required value="<?php echo $email?>">
								</div>
								
								
								
							   <button id="payment-button" name="submit" type="submit" class="btn btn-lg btn-info btn-block">
							   <span id="payment-button-amount">Submit</span>
							   </button>
							   <div class="field_error"><?php echo $msg?></div>
							</div>
						</form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
		 
		 
         
<?php
include('footer.php');
?>