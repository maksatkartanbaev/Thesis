<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$db = "test";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $db);

if (!$conn){
    die("Connection failed: " . mysqli_connect_error());
}

$citizen = $_POST['citizen'];

$sql = "INSERT INTO `payment system`(Name_sys) VALUES ('$citizen')";

if ($conn->query($sql) === TRUE) {
    echo "Added successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

mysqli_close($conn);
?>