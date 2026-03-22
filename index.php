<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100..900&display=swap" rel="stylesheet">

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Survey 2026</title>

<script>
function checkAge() {
    let Age = document.form1.age.value.length;
    let AGE = Number(document.form1.age.value);

    if (AGE === 0) {
        alert("ENTER A VALID AGE..!");
        document.form1.age.value = "";
        return false;
    }

    if (Age > 2 || Age < 1) {
        alert("ENTER A VALID AGE..!");
        document.form1.age.value = "";
        return false;
    }

    return true;
}

function checkPhone() {
    let phNo = document.form1.phnumber.value.length;

    if (phNo != 10) {
        alert("ENTER A VALID MOBILE NUMBER..!");
        document.form1.phnumber.value = "";
        return false;
    }

    return true;
}

function check() {
    return checkAge() && checkPhone();
}

function handlesubmit() {
    if (check()) {
        document.querySelector("input[type='submit']").disabled = true;
        return true;
    }
    return false;
}
</script>

<style>
body {
    background: linear-gradient(135deg,#5582ff,#3652a1);
    min-height: 100vh;
    background-repeat: no-repeat;
    display: flex;
    justify-content: center;
}

h2 {
    text-align: center;
    font-family: 'Poppins','sans-serif';
}

h3 {
    font-weight: bold;
    font-family: 'Poppins',sans-serif;
    color: green;
}

fieldset {
    border: none;
    height: 90%;
    max-height: 900px;
    background: whitesmoke;
    width: 90%;
    max-width: 600px;
    margin-top: 20px;
    border-radius: 20px;
    box-shadow: 0 0 20px lightblue;
    text-align: center;
}

input[type='reset'], input[type='submit'] {
    border: none;
    margin-left: 5px;
    margin-top: 20px;
    background: #0096ff;
    color: white;
    width: 45%;
    height: 40px;
    border-radius: 20px;
    font-family: 'Oswald','sans-serif';
    font-weight: bold;
    letter-spacing: 1px;
    transition: 0.3s all ease;
}

input[type='reset']:focus {
    width: 46%;
    height: 45px;
    box-shadow: 0 0 10px #000000;
}

input[type='submit']:focus {
    width: 46%;
    height: 45px;
    background: #007acc;
}

input[type="text"], input[type="number"] {
    border: none;
    outline: none;
    border-bottom: 1px solid blue;
    background: transparent;
    width: 200px;
    height: 40px;
    transition: 0.3s all ease;
}

input[type="text"]:hover,
input[type="number"]:hover {
    width: 202px;
    height: 42px;
    box-shadow: 0 0 12px #b9ff2b;
    background: black;
    border-radius: 3px;
    color: whitesmoke;
    font-weight: bold;
    font-family:'Montserrat','sans-serif';
}

select {
    width: 170px;
    height: 40px;
    padding: 10px;
    border: none;
    font-family: 'Oswald','sans-serif';
    letter-spacing: 1px;
    font-weight: bold;
}

p {
    font-weight: bold;
    font-family: 'Poppins','sans-serif';
    text-align: center;
}

a {
    text-decoration: none;
}
</style>
</head>

<body>

<?php
include("database.php");

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name   = $_POST['name'] ?? '';
    $age    = $_POST['age'] ?? '';
    $phNo   = $_POST['phnumber'] ?? '';
    $gender = $_POST['gender'] ?? '';
    $city   = $_POST['city'] ?? '';

    if ($age <= 0 || $age > 99) {
        $message = "<h3 style='color:red'>DATA INSERTION FAILED: CHECK YOUR AGE</h3>";
    } 
    else if (strlen($phNo) != 10) {
        $message = "<h3 style='color:red'>DATA INSERTION FAILED: CHECK THE PHONE NUMBER</h3>";
    } 
    else {

        $insertquery = mysqli_prepare($conne, "INSERT INTO users(name, age, phoneNo, gender, city) VALUES (?, ?, ?, ?, ?)");

        if ($insertquery) {

            mysqli_stmt_bind_param($insertquery, "siiss", $name, $age, $phNo, $gender, $city);

            if (mysqli_stmt_execute($insertquery)) {
                $message = "<h3 style='color:green'>DATA INSERTED SUCCESSFULLY</h3>";
            } 
            else if (mysqli_errno($conne) == 1062) {
                $message = "<h3 style='color:red'>INVALID MOBILE NUMBER</h3>";
            } 
            else {
                $message = "<h3 style='color:red'>DATA INSERTION FAILED</h3>";
            }

            mysqli_stmt_close($insertquery);
        } 
        else {
            $message = "<h3 style='color:red'>Failed to prepare statement</h3>";
        }
    }
}

mysqli_close($conne);
?>

<fieldset>
<form name="form1" onsubmit="return handlesubmit()" method="POST">

<h2>WELCOME TO <br>LOCAL SURVEY</h2>

<b>NAME</b>: <input type="text" name="name" maxlength="20" required><br><br><br>

<b>AGE</b>: <input type="number" name="age" required><br><br><br>

<b>PHNO</b>: <input type="text" name="phnumber" required maxlength="10"><br><br><br>

<b>MALE</b> <input type="radio" name="gender" value="male" required>
<b>FEMALE</b> <input type="radio" name="gender" value="female"><br><br><br>

<b>CITY:</b>
<select name="city">
<option>Kannur</option>
<option>Kozhikode</option>
<option>Thiruvananthapuram</option>
<option>Malappuram</option>
<option>Kollam</option>
<option>Alappuzha</option>
<option>Wayanad</option>
<option>Kottayam</option>
<option>Palakkad</option>
<option>Thrissur</option>
<option>Ernakulam</option>
<option>Idukki</option>
<option>Kasargod</option>
<option>Pathanamthitta</option>
</select><br><br>

<input type="submit" value="Submit Form">
<input type="reset" value="Clear Form">

<p>For more information<br>
mail to <a href="mailto:adishjagano@gmail.com">Adish Jagan</a></p>

<?php echo $message ?>

</form>
</fieldset>

</body>
</html>