<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Clients</title>
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
                document.getElementById('issue_date_field').value = "";
                document.getElementById('issued_by_whom_field').value = "";
                document.getElementById('department_field').value = "";
                document.getElementById('index_field').value = "";
                document.getElementById('email_field').value = "";
                document.getElementById('address_field').value = "";
                document.getElementById('home_field').value = "";
                document.getElementById('mobile_field').value = "";
            })
            $('.rowt').click(function (){
                document.getElementById('submit_field').value = "Delete";
                let fio = $(this).data("row");
                $.ajax({
                    url: 'info-client.php',
                    method: 'GET',
                    data: {
                        'fio':fio,
                    },
                    success: function(data) {
                        let test = data.split('  ');
                        document.getElementById('client_id_field').value = test[0];
                        document.getElementById('fio_field').value = test[1];
                        document.getElementById('gender_field').value = test[2];
                        document.getElementById('birth_place_field').value = test[3];
                        document.getElementById('citizenship_field').value = test[4];
                        document.getElementById('social_status_field').value = test[15];
                        document.getElementById('series_field').value = test[5];
                        document.getElementById('id_field').value = test[6];
                        document.getElementById('issue_date_field').value = test[7];
                        document.getElementById('issued_by_whom_field').value = test[8];
                        document.getElementById('department_field').value = test[9];
                        document.getElementById('index_field').value = test[10];
                        document.getElementById('email_field').value = test[14];
                        document.getElementById('address_field').value = test[11];
                        document.getElementById('home_field').value = test[12];
                        document.getElementById('mobile_field').value = test[13];
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
                                    let fio = document.getElementById('fio_field').value;
                                    let gender = document.getElementById('gender_field').value;
                                    let birth_place = document.getElementById('birth_place_field').value;
                                    let citizenship = document.getElementById('citizenship_field').value;
                                    let social_status = document.getElementById('social_status_field').value;
                                    let series = document.getElementById('series_field').value;
                                    let id = document.getElementById('id_field').value;
                                    let issue_date = document.getElementById('issue_date_field').value;
                                    let issued_by_whom = document.getElementById('issued_by_whom_field').value;
                                    let department = document.getElementById('department_field').value;
                                    let index = document.getElementById('index_field').value;
                                    let email = document.getElementById('email_field').value;
                                    let address = document.getElementById('address_field').value;
                                    let home = document.getElementById('home_field').value;
                                    let mobile = document.getElementById('mobile_field').value;
                                    $.ajax({
                                        url: 'add-client.php',
                                        method: 'POST',
                                        data: {
                                            'fio':fio,
                                            'gender':gender,
                                            'birth_place':birth_place,
                                            'citizenship':citizenship,
                                            'social_status':social_status,
                                            'series':series,
                                            'id':id,
                                            'issue_date':issue_date,
                                            'issued_by_whom':issued_by_whom,
                                            'department':department,
                                            'index':index,
                                            'email':email,
                                            'address':address,
                                            'home':home,
                                            'mobile':mobile
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
                                        url: 'remove-client.php',
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
$query = "SELECT * FROM clients";


echo '
<div class="container">
<div class="row">
<div class="col-md-4">
<table class=""> 
      <tr> 
          <td>Full name</td> 
      </tr>
      <tr> 
          <td class="add_client btn btn-success">Add</td> 
      </tr>';

if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
        $field2name = $row["ID_client"];
        $field1name = $row["Full_name"];

        echo '<tr id="che" class="rowt btn btn-success" data-row='.$field2name.'>
                  <td>'.$field1name.'</td>
              </tr>';
    }
    $result->free();
}
echo '
</table>
</div>
<div class="col-md-8">
    <div class="row">
        <span class="col-4">Client ID:</span>
        <span class="col-8" type="text" id="client_id_field"></span>
    </div>
    <div class="row">
    <span class="col-4">Full name:</span>
    <input class="col-8" type="text" id="fio_field">
    </div>
    <div class="row">
    <span class="col-4">Gender:</span>
    <select class="col-8" id="gender_field">
    <option value="" selected disabled hidden>Choose here</option>
    <option value="Male">Male</option>
    <option value="Female">Female</option>
    </select>
    </div>
    <div class="row">
    <span class="col-4">Birth place:</span>
    <input class="col-8" type="text" id="birth_place_field">
    </div>
    <div class="row">
    <span class="col-4">Citizenship:</span>
    <select class="col-8" id="citizenship_field">
    <option value="" selected disabled hidden>Choose here</option>';
$query = "SELECT * FROM citizenship";
if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
        $cur = $row["Name_country"];
        echo '<option value=' . $row["ID_country"]. " " .$row["Name_country"] . '>' . $cur . '</option>';
    }
}
$result->free();
echo '
    </select>
    </div>
    <div class="row">
    <span class="col-4">Social status:</span>
    <select class="col-8" id="social_status_field">
    <option value="" selected disabled hidden>Choose here</option>';
$query = "SELECT * FROM `social status`";
if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
        $cur = $row["Name_stat"];
        echo '<option value=' . $row["ID_status"]. " " .$row["Name_stat"] . '>' . $cur . '</option>';
    }
}
$result->free();
echo '
    </select>
    </div>
    <div class="row">
    <span>Passport info</span>
    </div>
    <div class="row">
    <span class="col-4">Series:</span>
    <input class="col-8" type="text" id="series_field">
    </div>
    <div class="row">
    <span class="col-4">ID:</span>
    <input class="col-8" type="text" id="id_field">
    </div>
    <div class="row">
    <span class="col-4">Issue date:</span>
    <input class="col-8" type="date" id="issue_date_field">
    </div>
    <div class="row">
    <span class="col-4">Issued by whom:</span>
    <input class="col-8" type="text" id="issued_by_whom_field">
    </div>
    <div class="row">
    <span class="col-4">Department code:</span>
    <input class="col-8" type="text" id="department_field">
    </div>
    <div class="row">
    <span class="col-4">Index:</span>
    <input class="col-8" type="text" id="index_field">
    </div>
    <div class="row">
    <span class="col-4">E-mail:</span>
    <input class="col-8" type="text" id="email_field">
    </div>
    <div class="row">
    <span class="col-4">Address:</span>
    <input class="col-8" type="text" id="address_field">
    </div>
    <div class="row">
    <span class="col-4">Home phone:</span>
    <input class="col-8" type="text" id="home_field">
    </div>
    <div class="row">
    <span class="col-4">Mobile phone:</span>
    <input class="col-8" type="text" id="mobile_field">
    </div>
    <div class="row">
    <input class="submit_test col-4 btn btn-primary" type="submit" id="submit_field" value="Save">
    </div>
</div>
</body>';
?>

