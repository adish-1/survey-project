v<?php
include("database.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin page </title>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<style>
    body 
{
    background: linear-gradient(220deg,#2b96ff,#14487a);
    justify-content: center;
    min-height: 100vh;
    align-items: center;
}
 h1
 {
   color: #d2dbb7;
     text-align: center;
     font-size: 60px;
     font-family: 'Poppins',sans-serif;
 }
 table
 {
     width:90%;
     border: 1px solid whitesmoke;
     font-weight: bold;
     text-align: center;
     font-family:'Space Grotesk',sans-serif;
     border-radius: 10px;
     background:#ffffff;
     margin:30px auto;
 }
 th,td
  {
   padding:12px 15px;
 }
 a
 {
     text-decoration: none;
     margin-left: 23%;
     background: whitesmoke;
     padding: 20px;
     padding-right: 20%;
     padding-left: 20%;
     font-size: 30px;
     font-weight: bold;
     font-family: 'Poppins',sans-serif;
     border-radius: 20px;
     color:#2d45b2;
 }
</style>
</head>
<body>
    <h1>WELCOME TO ADMIN PAGE</h1><br>
<table border=1 rules=all>
<tr>
<th>Sn_No</th>
<th>Name</th>
<th>Age</th>
<th>PhoneNo</th>
<th>Gender</th>
<th>City</th>
</tr>
<?php
$sql = "SELECT * FROM users";
$result = mysqli_query($conne, $sql);
while($row = mysqli_fetch_assoc($result)) {
   echo "<tr>";
   echo "<td>".$row['sn_no']."</td>";
   echo "<td>".$row['name']."</td>";
   echo "<td>".$row['age']."</td>";
   echo "<td>".$row['phoneNo']."</td>";
   echo "<td>".$row['gender']."</td>";
   echo "<td>".$row['city']."</td>";
   echo "</tr>";
}
?>
</table>
<a href="login.php">LOG OUT</a>
</body>
</html>