<?php
require('db_connection.php');
session_start();

if($connection){
   $query="INSERT INTO shipment(send_name,send_address,recv_name,recv_address,ship_status,added_by,created_at) VALUES('".$_POST['send_name']."','".$_POST['send_address']."','".$_POST['recv_name']."','".$_POST['recv_address']."',0,'".$_SESSION['agent']['id']."','".date('Y:m:d h:i:s')."') ";
    $result = mysqli_query($connection,$query);
    if($result){
        header('location:addCourier.php?msg=added successfully');
        //print_r($row);
    }else{
        echo "Query Failed";
    }

}else{
    echo "connectio error";
}


?>