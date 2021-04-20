<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Main Menu</title>
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="../dist/jquery-confirm.min.js"></script>
    <script src="../dist/bootstrap.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.citi').click(function(){
                $.confirm({
                    useBootstrap: false,
                    title: '',
                    content: 'Do you want to add ' + document.getElementById('citizenship').value + ' ?' ,
                    buttons: {
                        confirm: {
                            text: 'Yes',
                            btnClass: 'btn-primary',
                            action: function () {
                                let citizen = document.getElementById('citizenship').value;
                                $.ajax({
                                    url: 'add-service.php',
                                    method: 'POST',
                                    data: {
                                        'citizen': citizen
                                    }
                                });
                                location.reload();
                            }
                        },
                        cancel: {
                            text: 'No',
                            btnClass: 'btn-danger',
                            action: function(){
                            }
                        },
                    }
                })
            })
            $('.row').click(function (){
                let citi_row = $(this).data("row");
                $.confirm({
                    useBootstrap: false,
                    title: '',
                    content: 'Do you want to delete this?',
                    buttons: {
                        confirm: {
                            text: 'Yes',
                            btnClass: 'btn-primary',
                            action: function (){
                                $.ajax({
                                    url: 'remove-service.php',
                                    method: 'POST',
                                    data: {
                                        'citi_row': citi_row
                                    }
                                });
                                location.reload();
                            }
                        },
                        cancel: {
                            text: 'No',
                            btnClass: 'btn-danger',
                            action: function(){
                            }
                        },
                    }
                })
            })
        });
    </script>
</head>
<body>
<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "test";
$mysqli = new mysqli($hostname, $username, $password, $database);
$query = "SELECT * FROM `additional services`";


echo '<table class="main"> 
      <tr> 
          <td>Service ID</font> </td> 
          <td>Service</font> </td> 
      </tr>';

if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
        $field1name = $row["ID_service"];
        $field2name = $row["Name_service"];

        echo '<tr class="row" data-row='.$field1name.'> 
                  <td>'.$field1name.'</td>
                  <td>'.$field2name.'</td>
              </tr>';
    }
    $result->free();
}
echo '<input type="text" class="citizenship" id="citizenship">
      <input class="citi" id="citi" type="submit" value="Save data">
    ';
?>
</body>
