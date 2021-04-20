<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$db = "test";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $db);

if (!$conn){
    die("Connection failed: " . mysqli_connect_error());
}

$citi_row = $_POST['citi_row'];

$sql = "DELETE FROM clients WHERE Full_name='$citi_row'";

if ($conn->query($sql) === TRUE) {
    echo "Added successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

mysqli_close($conn);
?>