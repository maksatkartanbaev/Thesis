<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$db = "test";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $db);

if (!$conn){
    die("Connection failed: " . mysqli_connect_error());
}

$fio = $_POST['fio'];
$gender = $_POST['gender'];
$place = $_POST['birth_place'];
$citizen = $_POST['citizenship'];
$series = $_POST['series'];
$id = $_POST['id'];
$issue_date = $_POST['issue_date'];
$issued_by = $_POST['issued_by_whom'];
$department = $_POST['department'];
$index = $_POST['index'];
$address = $_POST['address'];
$home = $_POST['home'];
$mobile = $_POST['mobile'];
$email = $_POST['email'];
$social = $_POST['social_status'];

$sql = "INSERT INTO clients(full_name, gender, place_birth, id_country, series, id_pass, issue_date, issued_by, code_department, index_post, adress, phone_home, phone_mob, `e-mail`, id_status) VALUES ('$fio','$gender','$place','$citizen','$series','$id','$issue_date','$issued_by','$department','$index','$address','$home','$mobile','$email','$social')";

if ($conn->query($sql) === TRUE) {
    echo "Added successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

mysqli_close($conn);
?>