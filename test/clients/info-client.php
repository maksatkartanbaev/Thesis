<?php
$fio = $_GET['fio'];
$hostname = "localhost";
$username = "root";
$password = "";
$database = "test";
$mysqli = new mysqli($hostname, $username, $password, $database);
$query = "SELECT * FROM clients WHERE ID_client='$fio'";
$result = $mysqli->query($query);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "".$row['ID_client']. "  " .$row['Full_name']. "  " .$row['Gender']. "  " .$row['Place_birth']. "  " .$row['ID_country']. "  " .$row['Series']. "  " .$row['ID_pass']. "  " .$row['Issue_date']. "  " .$row['Issued_by']. "  " .$row['Code_department']. "  " .$row['Index_post']. "  " .$row['Adress']. "  " .$row['Phone_home']. "  " .$row['Phone_mob']. "  " .$row['E-mail']. "  " .$row['ID_status']. "";
    }
}
$mysqli->close();
?>