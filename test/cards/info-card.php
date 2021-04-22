<?php
$fio = $_GET['fio'];
$hostname = "localhost";
$username = "root";
$password = "";
$database = "test";
$mysqli = new mysqli($hostname, $username, $password, $database);
$query = "SELECT * FROM card WHERE ID='$fio'";
$result = $mysqli->query($query);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "".$row['ID']. "  " .$row['Valid_thru']. "  " .$row['ID_service']. "  " .$row['ID_client']. "  " .$row['ID_cur']. "  " .$row['ID_sys']. "  " .$row['ID_type']. "  " .$row['PIN']. "  " .$row['Proccessing']. "  " .$row['Given']. "  " .$row['Date']. "";
    }
}
$mysqli->close();
?>