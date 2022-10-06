<?php

require ('koneksi.php');
if(isset($_POST['register']) ){
    $userMail = $_POST['txt_mail'];
    $userPass = $_POST['txt_pass'];
    $userName = $_POST['txt_nama'];

    $query = "INSERT INTO user_detail VALUES('', '$userMail', '$userPass', '$userName',2)";
    $result = mysqli_query($koneksi, $query);
    header ('Location: login.php');
}
?>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="style/regis.css">
</head>
<body>
    <form action="register.php" method="POST">
        <p>email &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:<input type="text" name="txt_mail" required></p>
        <p>password :<input type="password" name="txt_pass" required></p>
        <p>nama &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:<input type="text" name="txt_nama" required></p> 
        <button type="submit" name="register">Register</button>
    </form>
    <p><a href="login.php">login</p>
</body>
</html>
        