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
            $('.add_client').click(function (){
                document.getElementById('submit_field').value = "Save";
                document.getElementById('client_id_field').value = "";
                document.getElementById('fio_field').value = "";
                document.getElementById('gender_field').value = "";
                document.getElementById('birth_place_field').value = "";
                document.getElementById('citizenship_field').value = "";
                document.getElementById('social_status_field').value = "";
                document.getElementById('series_field').value = "";
                document.getElementById('id_field').value = "";
                document.getElementById('issue_date_field').checked = false;
                document.getElementById('issued_by_whom_field').checked = false;
            })
            $('.row').click(function (){
                document.getElementById('submit_field').value = "Delete";
                let fio = $(this).data("row");
                $.ajax({
                    url: 'info-card.php',
                    method: 'GET',
                    data: {
                        'fio':fio,
                    },
                    success: function(data) {
                        let test = data.split(' ');
                        document.getElementById('client_id_field').value = test[3];
                        document.getElementById('fio_field').value = test[1];
                        document.getElementById('gender_field').value = test[0];
                        document.getElementById('birth_place_field').value = test[6];
                        document.getElementById('citizenship_field').value = test[4];
                        document.getElementById('social_status_field').value = test[5];
                        document.getElementById('series_field').value = test[2];
                        document.getElementById('id_field').value = test[7];
                        document.getElementById('issue_date_field').checked = test[8] == 1;
                        document.getElementById('issued_by_whom_field').checked = test[9] == 1;
                    }
                });
            })
            $('.submit_test').click(function() {
                if (document.getElementById('submit_field').value === 'Save') {
                    $.confirm({
                        useBootstrap: false,
                        title: '',
                        content: 'Do you want to save?',
                        buttons: {
                            confirm: {
                                text: 'Yes',
                                btnClass: 'btn-primary',
                                action: function () {
                                    let client = document.getElementById('client_id_field').value;
                                    let fio = document.getElementById('fio_field').value;
                                    let gender = document.getElementById('gender_field').value;
                                    let birth_place = document.getElementById('birth_place_field').value;
                                    let citizenship = document.getElementById('citizenship_field').value;
                                    let social_status = document.getElementById('social_status_field').value;
                                    let series = document.getElementById('series_field').value;
                                    let id = document.getElementById('id_field').value;
                                    let issue_date = document.getElementById('issue_date_field').checked;
                                    let issued_by_whom = document.getElementById('issued_by_whom_field').checked;
                                    $.ajax({
                                        url: 'add-card.php',
                                        method: 'POST',
                                        data: {
                                            'client':client,
                                            'fio':fio,
                                            'gender':gender,
                                            'birth_place':birth_place,
                                            'citizenship':citizenship,
                                            'social_status':social_status,
                                            'series':series,
                                            'id':id,
                                            'issue_date':issue_date,
                                            'issued_by_whom':issued_by_whom
                                        }
                                    });
                                    location.reload();
                                }
                            },
                            cancel: {
                                text: 'No',
                                btnClass: 'btn-danger',
                                action: function () {
                                }
                            },
                        }
                    })
                } else {
                    let citi_row = $(document.getElementById('che')).data("row");
                    $.confirm({
                        useBootstrap: false,
                        title: '',
                        content: 'Do you want to delete this?',
                        buttons: {
                            confirm: {
                                text: 'Yes',
                                btnClass: 'btn-primary',
                                action: function () {
                                    $.ajax({
                                        url: 'remove-card.php',
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
                                action: function () {
                                }
                            },
                        }
                    })
                }
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
$query = "SELECT * FROM card";


echo '<table class="main left_block"> 
      <tr> 
          <td>Card number</td> 
          <td>Full name</td> 
      </tr>
      <tr> 
          <td class="add_client">Add</td> 
      </tr>';

if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
        $field1name = $row["ID"];
        $field2name = $row["ID_client"];

        echo '<tr id="che" class="row" data-row='.$field1name.'>
                  <td>'.$field1name.'</td>
                  <td>'.$field2name.'</td>
              </tr>';
    }
    $result->free();
}
echo '
<div class="right_block">
    <div class="rowtt">
        <span class="span_test">Client Full name:</span>
        <input class="input_test" type="text" id="client_id_field">
    </div>
    <div class="rowtt">
    <span class="span_test">Valid thru:</span>
    <input class="input_test" type="date" id="fio_field">
    </div>
    <div class="rowtt">
    <span class="span_test">Card number:</span>
    <input class="input_test" type="text" id="gender_field">
    </div>
    <div class="rowtt">
    <span class="span_test">Card type:</span>
    <input class="input_test" type="text" id="birth_place_field">
    </div>
    <div class="rowtt">
    <span class="span_test">Currency:</span>
    <input class="input_test" type="text" id="citizenship_field">
    </div>
    <div class="rowtt">
    <span class="span_test">Payment system:</span>
    <input class="input_test" type="text" id="social_status_field">
    </div>
    <div class="rowtt">
    <span class="span_test">Additional service:</span>
    <input class="input_test" type="text" id="series_field">
    </div>
    <div class="rowtt">
    <span class="span_test">PIN:</span>
    <input class="input_test" type="text" id="id_field">
    </div>
    <div class="rowtt">
    <span class="span_test">Send to proccesing:</span>
    <input class="input_test" type="checkbox" id="issue_date_field">
    </div>
    <div class="rowtt">
    <span class="span_test">Given:</span>
    <input class="input_test" type="checkbox" id="issued_by_whom_field">
    </div>
    <div class="rowtt">
    <input class="submit_test" type="submit" id="submit_field" value="Save">
    </div>
</div>'
?>
</body>
