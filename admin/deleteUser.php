<?php 
    require('db_connection.php');
    if(isset($_GET['id'])){
        $query="DELETE FROM users WHERE id=".$_GET['id'];
        $result=mysqli_query($connection,$query);
        if($result){
            header('location:viewUser.php?msg=Record deleted successfully!.....');
        }else{
            header('location:viewUser.php?msg=Something went wrong');
        }
    }


?>