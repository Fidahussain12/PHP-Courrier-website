<?php
require('db_connection.php');
session_start();
if($connection){
   $query="UPDATE shipment SET send_name = '".$_POST['send_name']."' ,send_address='".$_POST['send_address']."',recv_name='".$_POST['recv_name']."',recv_address='".$_POST['recv_address']."',updated_by = '".$_SESSION['user']['id']."' WHERE ship_id=".$_POST['ship_id'] ;
   $result = mysqli_query($connection,$query);
    if($result){
        header('location:viewCouriers.php?msg=updated successfully');
        //print_r($row);
    }else{
        echo "Query Failed";
    }

}else{
    echo "connectio error";
}


?>