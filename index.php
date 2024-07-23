<?php 
$connection = mysqli_connect('localhost', 'root', '', 'courier');

// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT * FROM 'shipment' ORDER BY id";
$result = mysqli_query($connection, $query);

// Check if query was successful
if (!$result) {
    die("Query failed: " . mysqli_error($connection));
}

// Check if there are rows returned
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <h1><?php echo $row['title']?></h1>
        <p><?php echo $row['description']?></p>
        <p><?php echo $row['created_at']?></p>
        <?php
    }
} else {
    echo "No results found";
}

// Close connection
mysqli_close($connection);
?>





