<?php
require('db_connection.php');
session_start();

if($connection){
   $query="INSERT INTO users(user_name,user_email,user_password,user_role,branch,added_by,created_at) VALUES('".$_POST['user_name']."','".$_POST['user_email']."','".$_POST['user_password']."','".$_POST['user_role']."','".$_POST['branch']."','".$_SESSION['user']['id']."','".date('Y:m:d h:i:s')."') ";
    $result = mysqli_query($connection,$query);
    if($result){
        header('location:addUser.php?msg=added successfully');
        //print_r($row);
    }else{
        echo "Query Failed";
    }

}else{
    echo "connectio error";
}


?>