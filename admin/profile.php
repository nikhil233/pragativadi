<?php
require('top.php');
$username="";
$useremail="";
$pass="";
$conpass="";
if(isset($_GET['id']) && $_SESSION['user_session']==$_GET['id']){
    $id =  $crud->escape_string($_GET['id']);
    $sql="SELECT * from admin where id=$id";
    $result=$crud->getData($sql);
    $username=$result[0]['username'];
    $useremail=$result[0]['email'];
}
else{
    redirect('index.php');
}
if(isset($_POST['save'])){
    $pass=$crud->escape_string($_POST['password']);
    $conpass=$crud->escape_string($_POST['cnfrpassword']);
    if($pass==$conpass){
        $return=$script->changepass($pass);
        if($return){
        ?>
        <script> alert("Password changed");</script>
        <?php
        redirect('index.php');
        }
        else{
            ?>
        <script> alert("Password not changed. Try again.");</script>
        <?php
        }
    }
    else{
        ?>
        <script> alert("Match password and confirm password");</script>
        <?php
    }
    
}
if(isset($_POST['save_profile'])){
    $username=$crud->escape_string($_POST['username']);
    $useremail=$crud->escape_string($_POST['useremail']);
    $id=$_SESSION['user_session'];
    $result= $crud->execute("UPDATE admin set username='$username',email='$useremail' where id='$id' ");
    if( $result){
        ?>
        <script> alert("Profile updated");</script>
        <?php
        redirect('index.php');
    }
    else{
        echo"none";
    }
    
}
?>

<div class="row">
	<div class="col-md-12 col-lg-12 grid-margin stretch-card">
	    <div class="card">
		    <div class="card-body">
                <form class="forms-sample" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleInputName1">User Name</label>
                        <input type="text" class="form-control" id="exampleInputName1" placeholder="User Name" name="username"  value="<?php echo $username?>" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Email</label>
                        <input type="email" class="form-control" id="exampleInputName1" placeholder="User Name" name="useremail"  value="<?php echo $useremail?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2" name="save_profile">Save</button>
                </form>
                <form class="forms-sample" method="post" >
                    <h2>Update password</h2>
                    <div class="form-group">
                        <label for="exampleInputName1">New Password</label>
                        <input type="password" class="form-control" id="exampleInputName1" placeholder="password" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Confirm Password</label>
                        <input type="password" class="form-control" id="exampleInputName1" placeholder="Confirm password" name="cnfrpassword" required >
                    </div>

                    <button type="submit" class="btn btn-primary mr-2" name="save">Save</button>
                </form>
            </div>
        </div>
    <div>
</div>


<?php
require('footer.php');
?>
     