<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$db = "test";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $db);

if (!$conn){
    die("Connection failed: " . mysqli_connect_error());
}

$name = $_POST['name'];
$gender = $_POST['gender'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$id = 1;
$issue = date("Y-m-d");
$d = strtotime("+3 Years");
$expire = date("Y-m-d",$d);
$cvc = 123;
$pin = 1234;

$sql = "INSERT INTO user (Name, Gender, Address, Phone, ID, Issue, Expire, CVC, Pin) VALUES ('$name', '$gender', '$address', '$phone', '$id', '$issue', '$expire', $cvc, $pin)";

if ($conn->query($sql) === TRUE) {
echo "Added successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

mysqli_close($conn);
?>