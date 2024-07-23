<?php 
    require('db_connection.php');
    if(isset($_GET['id'])){
        $query="DELETE FROM shipment WHERE ship_id=".$_GET['id'];
        $result=mysqli_query($connection,$query);
        if($result){
            header('location:viewCouriers.php?msg=Record deleted successfully!.....');
        }else{
            header('location:viewCouriers.php?msg=Something went wrong');
        }
    }


?>