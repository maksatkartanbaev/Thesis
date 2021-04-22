<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bills</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="../dist/jquery-confirm.min.js"></script>
    <script src="../dist/bootstrap.min.js"></script>
</head>
<body>
<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "test";
$mysqli = new mysqli($hostname, $username, $password, $database);
$query = "SELECT * FROM card";
echo'
<div class="container">
<div class="row">
<div class="col-2"></div>
<div class="col-8">
<table class="table"> 
      <tr> 
          <td>Card number</font> </td> 
          <td>Date of apply</font> </td>
          <td>Client name</td>
          <td>Card type</td>
      </tr>
     
';
if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
        $field1name = $row["ID"];
        $field2name = $row["Date"];
        $query1 = "SELECT Full_name FROM clients WHERE ID_client={$row['ID_client']}";
        $result1 = $mysqli->query($query1);
        if ($result1->num_rows > 0) {
            while ($row1 = $result1->fetch_assoc()) {
                $field3name = $row1["Full_name"];
            }
        }
        $query2 = "SELECT Name_type FROM `card type` WHERE ID_type={$row['ID_type']}";
        $result2 = $mysqli->query($query2);
        if ($result2->num_rows > 0) {
            while ($row2 = $result2->fetch_assoc()) {
                $field4name = $row2["Name_type"];
            }
        }
        echo '<tr class="" data-row='.$field1name.'> 
                  <td>'.$field1name.'</td>
                  <td>'.$field2name.'</td>
                  <td>'.$field3name.'</td>
                  <td>'.$field4name.'</td>
              </tr>';
    }
    echo'
</table>
</div>
<div class="col-2"></div>
</div>
</div>
</body>
</html>
';
}

?>