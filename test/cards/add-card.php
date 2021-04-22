<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$db = "test";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $db);

if (!$conn){
    die("Connection failed: " . mysqli_connect_error());
}
$client = $_POST['client'];
$fio = $_POST['fio'];
$gender = $_POST['gender'];
$place = $_POST['birth_place'];
$citizen = $_POST['citizenship'];
$social = $_POST['social_status'];
$series = $_POST['series'];
$id = $_POST['id'];
if ($_POST['issue_date'] == 'true'){
    $issue_date = 1;
}
else{
    $issue_date = 0;
}
if ($_POST['issued_by_whom'] == 'true'){
    $issued_by = 1;
}
else{
    $issued_by = 0;
}
$today = $_POST['date'];

$sql = "INSERT INTO card(id, valid_thru, id_service, id_client, id_cur, id_sys, id_type, pin, proccessing, given, date) VALUES ('$gender','$fio','$series','$client','$citizen','$social','$place','$id','$issue_date','$issued_by','$today')";

if ($conn->query($sql) === TRUE) {
    echo "Added successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

mysqli_close($conn);
?>