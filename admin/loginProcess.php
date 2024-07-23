<?php
require('db_connection.php');
session_start();
if($connection){
    $query="SELECT * FROM users WHERE user_email='".$_POST['email']."' AND user_password='".$_POST['password']."' AND user_role=1";
    $result = mysqli_query($connection,$query);
    if($result->num_rows){
        $row = mysqli_fetch_assoc($result);
        $_SESSION['user'] = $row;
        header('location:index.php');
    }else{
        header('location:login.php?msg=Invalid username/password');
    }

}else{
    echo "connectio error";
}

?>