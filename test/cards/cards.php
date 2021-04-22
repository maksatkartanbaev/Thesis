<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cards</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
            $('.rowt').click(function (){
                document.getElementById('submit_field').value = "Delete";
                let fio = $(this).data("row");
                $.ajax({
                    url: 'info-card.php',
                    method: 'GET',
                    data: {
                        'fio':fio,
                    },
                    success: function(data) {
                        let test = data.split('  ');
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
                        document.getElementById('date_field').value = test[10];
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
                                    let date = document.getElementById('date_field').value;
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
                                            'issued_by_whom':issued_by_whom,
                                            'date':date
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



echo '
<div class="container">
<div class="row">
<div class="col-md-4">
<table class=""> 
        <tr> 
            <td>Card number</td> 
        </tr>
        <tr> 
            <td class="add_client btn btn-success">Add</td>
        </tr>';
$query = "SELECT * FROM card";
if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
        $field1name = $row["ID"];
        $field2name = $row["ID_client"];

        echo '<tr>
                  <td data-row='.$field1name.' id="che" class="rowt btn btn-success">'.$field1name.'</td>
            </tr>';
    }
    $result->free();
}
echo '
</table>
</div>
<div class="col-md-8">
    <div class="row">
        <span class="col-4">Client Full name:</span>
        <select class="col-8" id="client_id_field">
        <option value="" selected disabled hidden>Choose here</option>';
$query = "SELECT * FROM clients";
if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
        $cur = $row["Full_name"];
        echo '<option value=' . $row["ID_client"]. " " .$row["Full_name"] . '>' . $cur . '</option>';
    }
}
$result->free();
echo '
    </select>
    </div>
    <div class="row">
    <span class="col-4">Valid thru:</span>
    <input class="col-8" type="date" id="fio_field">
    </div>
    <div class="row">
    <span class="col-4">Card number:</span>
    <input class="col-8" type="text" id="gender_field">
    </div>
    <div class="row">
    <span class="col-4">Card type:</span>
    <select class="col-8" id="birth_place_field">
    <option value="" selected disabled hidden>Choose here</option>';
$query = "SELECT * FROM `card type`";
if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
        $cur = $row["Name_type"];
        echo '<option value=' . $row["ID_type"]. " " .$row["Name_type"] . '>' . $cur . '</option>';
    }
}
$result->free();
echo '
    </select>
    </div>
    <div class="row">
    <span class="col-4">Currency:</span>
    <select class="col-8" id="citizenship_field">
    <option value="" selected disabled hidden>Choose here</option>';
$query = "SELECT * FROM currency";
if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
        $cur = $row["Currency"];
        echo '<option value=' . $row["ID_cur"]. " " .$row["Currency"] . '>' . $cur . '</option>';
    }
}
$result->free();
    echo '
    </select>
    </div>
    <div class="row">
    <span class="col-4">Payment system:</span>
    <select class="col-8" id="social_status_field">
    <option value="" selected disabled hidden>Choose here</option>';
$query = "SELECT * FROM `payment system`";
if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
        $cur = $row["Name_sys"];
        echo '<option value=' . $row["ID_sys"]. " " .$row["Name_sys"] . '>' . $cur . '</option>';
    }
}
$result->free();
echo '
        </select>
        </div>
        <div class="row">
            <span class="col-4">Additional service:</span>
            <select class="col-8" id="series_field">
                <option value="" selected disabled hidden>Choose here</option>';
$query = "SELECT * FROM `additional services`";
if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
        $cur = $row["Name_service"];
        echo '<option value=' . $row["ID_service"]. " " .$row["Name_service"] . '>' . $cur . '</option>';
    }
}
$result->free();
echo '
            </select>
        </div>
        <div class="row">
        <span class="col-4">PIN:</span>
        <input class="col-8" type="text" id="id_field">
        </div>
        <div class="row">
        <span class="col-4">Send to processing:</span>
        <input class="" type="checkbox" id="issue_date_field">
        </div>
        <div class="row">
        <span class="col-4">Given:</span>
        <input class="" type="checkbox" id="issued_by_whom_field">
        </div>
        <div class="row">
        <span class="col-4">Date of apply:</span>
        <input class="col-8" type="date" id="date_field">
        </div>
        <div class="row">
        <input class="col-4 submit_test btn btn-primary" type="submit" id="submit_field" value="Save">
        </div>
    </div>
    </div>
</div>
</body>';
?>

