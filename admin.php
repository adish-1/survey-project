<?php
if (isset($_POST['username']) && isset($_POST['Password'])) {
    $username = $_POST['username'];
    $password = $_POST['Password'];

    $authName = "your_admin_username";
    $authKey  = "your_admin_password";

    if ($username === $authName && $password === $authKey) {
        header("location:dash.php");
        exit();
    } else {
        $message = "WRONG INPUT....";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@100;300;400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Raeil:wght@100;300;400;500;700&display=swap" rel="stylesheet">
    <script>
        function showPass() {
            let x = document.form1.Password;
            x.type = (x.type === "password") ? "text" : "password";
        }

        function showName() {
            let x = document.form1.username;
            x.type = (x.type === "password") ? "text" : "password";
        }
    </script>
    <style>
        body {
            background: linear-gradient(210deg,#4f468b,#9180ff);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-repeat: no-repeat;
        }

        h2 {
            color: skyblue;
            font-family:'Lato','sans-serif';
            text-align: center;
        }

        fieldset {
            width: 90%;
            max-width: 800px;
            text-align: center;
            background: whitesmoke;
            border: none;
            border-radius: 20px;
            box-shadow: 0 0 20px #afff6a;
            padding: 40px 20px;
        }

        input[type="text"], input[type="password"] {
            border: none;
            background: transparent;
            width: 40%;
            max-width: 400px;
            height: 70px;
            outline: none;
            border-radius: 4px;
            border-bottom: 2px solid black;
            font-weight: bold;
            font-family: 'Lato','sans-serif';
            transition: 0.2s ease all;
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            font-size: 15px;
            box-shadow: 3px 4px 10px #74afe7;
            width: 45%;
            height: 75px;
        }

        input[type="submit"], input[type="reset"] {
            margin-bottom: 10px;
            width: 30%;
            max-width: 400px;
            height: 40px;
            margin: auto;
            border-radius: 20px;
            border: none;
            background: #55acff;
            color: white;
            font-weight: bold;
            font-family: 'Raeil','sans-serif';
            transition: 0.3s ease all;
        }

        input[type="submit"]:focus,
        input[type="reset"]:focus {
            background: #c60800;
            width: 35%;
            height: 45px;
        }

        input[type="button"] {
            border: none;
            width: 5%;
            height: 20px;
            background: #2b96ff;
            border-radius: 6px;
            transition: 0.3s ease all;
        }

        input[type="button"]:hover {
            width: 6%;
            height: 25px;
        }
    </style>
</head>
<body>
    <fieldset>
        <h2>ADMIN PANEL</h2>
        <form name="form1" method="POST">
            <input type="text" name="username" required placeholder="Username">
            &nbsp;&nbsp;&nbsp;
            <input type="button" value="👁️" onclick="showName()">
            <br><br>
            <input type="password" name="Password" required placeholder="Password">
            &nbsp;&nbsp;&nbsp;
            <input type="button" value="👁️" onclick="showPass()">
            <br><br><br>
            <input type="submit" value="Submit">&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="reset" value="Clear">
            <?php if(isset($message)) echo $message; ?>
        </form>
    </fieldset>
</body>
</html>