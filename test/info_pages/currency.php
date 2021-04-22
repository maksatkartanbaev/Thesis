<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Currency</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
                                    url: 'add-currency.php',
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
            $('.rowt').click(function (){
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
                                    url: 'remove-currency.php',
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
$query = "SELECT * FROM currency";


echo '
<div class="container">
<div class="row">
<div class="col-3"></div>
<div class="col-6">
<div class="row">
<input type="text" class="citizenship" id="citizenship">
<input class="citi" id="citi" type="submit" value="Save data">
</div>
<div class="row">
<table class="table"> 
      <tr> 
          <td>Currency ID</font> </td> 
          <td>Currency</font> </td> 
      </tr>';

if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
        $field1name = $row["ID_cur"];
        $field2name = $row["Currency"];

        echo '<tr class="rowt" data-row='.$field1name.'> 
                  <td>'.$field1name.'</td>
                  <td>'.$field2name.'</td>
              </tr>';
    }
    echo '</table>
</div>
    <div class="col-3"></div>
    </div>
    </div>';
    $result->free();
}

?>
</body>
