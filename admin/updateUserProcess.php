<?php
require('db_connection.php');
session_start();
if($connection){
   $query="UPDATE users SET user_name = '".$_POST['user_name']."' ,user_email='".$_POST['user_email']."',user_password='".$_POST['user_password']."',user_role='".$_POST['user_role']."',branch = '".$_POST['branch']."' WHERE id=".$_POST['id'] ;
   $result = mysqli_query($connection,$query);
    if($result){
        header('location:viewUser.php?msg=updated successfully');
        //print_r($row);
    }else{
        echo "Query Failed";
    }

}else{
    echo "connectio error";
}


?>