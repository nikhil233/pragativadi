<?php
include_once '../classes/DbConfig.php';
session_start();
class script extends DbConfig
{
   
    // Instantiate object with database connection
    public function __construct()
	{
		parent::__construct();
	}

    // Register new users
    public function register($user_name, $user_email, $user_password)
    {
        
            // Hash password
            $user_hashed_password = password_hash($user_password, PASSWORD_BCRYPT);
            // Define query to insert values into the users table
            $stmt= $this->connection->stmt_init();
            $sql = "INSERT INTO admin(username, email, password,role,status) VALUES(?, ?, ?,'1','1')";

            // Prepare the statement
            $stmt = $this->connection->prepare($sql);
            $stmt->bind_param('sss', $user_name, $user_email,$user_hashed_password);
            $stmt->execute();
           
    }

    // Log in registered users with either their username or email and their password
    public function login( $user_email, $user_password)
    {
            $stmt= $this->connection->stmt_init();
            $sql = "SELECT * FROM `admin` WHERE `email`=?   LIMIT 1";
            // Prepare the statement
            $stmt = $this->connection->prepare($sql);
            $stmt->bind_param('s', $user_email);
            $stmt->execute();
            $result = $stmt->get_result();
            // if($result){
            //     while($rows = $result->fetch_assoc()){
            //     $_SESSION['IS_LOGIN']=yes;
            //     $_SESSION['user_session'] = $rows['id'];
            //     $_SESSION['user_name'] = $rows['username'];
            //     $_SESSION['admin_role'] = $rows['role'];
            //     return true;
            //     }
            // }
            // else{
            //     return false;
            // }
            while($rows = $result->fetch_assoc()){
                $dbp=$rows['password'];
                if(password_verify($user_password, $dbp)){
                    $_SESSION['IS_LOGIN']=yes;
                    $_SESSION['user_session'] = $rows['id'];
                    $_SESSION['user_name'] = $rows['username'];
                    $_SESSION['admin_role'] = $rows['role'];
                    return true;
                    
                }
                else{
                   
                    return false;
                }
            }
            // Check if row is actually returned
            // if ($stmt->rowCount() > 0) {
            //     // Verify hashed password against entered password
            //     if (password_verify($user_password, $returned_row['password'])) {
            //         // Define session on successful login
            //         $_SESSION['user_session'] = $returned_row['id'];
            //         return true;
            //     } else {
            //         // Define failure
            //         return false;

            //     }
            // }
    }
    public function changepass($pass){
       $id = $_SESSION['user_session']; 
       $user_hashed_password = password_hash($pass, PASSWORD_BCRYPT);
       $stmt= $this->connection->stmt_init();
       $sql = "UPDATE admin set password=? where id='$id' ";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param('s',$user_hashed_password);
        $stmt->execute();
        return true;
    }
    // Check if the user is already logged in
    public function is_logged_in() {
        // Check if user session has been set
        if (isset($_SESSION['IS_LOGIN'])) {
            return true;
        }
    }

    // Redirect user
    // public function redirect($url) {
    //     header("Location: $url");
    // }

    // Log out user
    public function log_out() {
        // Destroy and unset active session
        session_destroy();
        unset($_SESSION['IS_LOGIN']);
        unset($_SESSION['user_session']);
        unset($_SESSION['user_name']);
        return true;
    }
} 