<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>
        Registration
    </title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="dist/jquery-confirm.min.js"></script>
    <script src="dist/bootstrap.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.but').click(function(){
                var name = document.getElementById('name').value;
                var address = document.getElementById('address').value;
                var phone = document.getElementById('phone').value;
                var gender = document.querySelector('input[name="gender"]:checked').value;
                alert(gender);
                return $.ajax({
                    url: 'update-test-add.php',
                    method: 'POST',
                    data:{
                        'name':name,
                        'address':address,
                        'phone':phone,
                        'gender':gender
                    }
                });
            })
            });
    </script>
</head>
<body>
<header>
    <div class="info">

    </div>
    <div class="buttons">
        <a href="index.php" class="header-button">Back to Main Menu</a>
    </div>
</header>
<div class="block">
    <div class="left">
        <span class="label">Name</span>
        <input type="text" class="name input" id="name" name="name">
        <span class="label">Gender</span>
        <div class="label">
            <input type="radio" id="gender" class="gender" name="gender" value="Male">
            <label for="male">Male</label>
            <input type="radio" id="gender" class="gender" name="gender" value="Female">
            <label for="female">Female</label>
        </div>
        <span class="label">Address</span>
        <input type="text" class="address input" id="address" name="address">
        <span class="label">Phone number</span>
        <input type="text" class="phone input" id="phone" name="phone">
    </div>
    <div class="right">
        <span class="label">Series</span>
        <input type="text" class="series input" id="series" name="series">
        <span class="label">Number</span>
        <input type="text" class="number input" id="number" name="number">
        <span class="label">Issue date</span>
        <input type="date" class="issue_date input" id="issue_date" name="issue_date">
        <span class="label">Issuing authority</span>
        <input type="text" class="authority input" id="authority" name="authority">
    </div>
</div>
<input class="but" id="but" type="submit" value="Register user">
</body>
