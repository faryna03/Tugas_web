<?php
require('koneksi.php');

session_start();

if( isset($_POST['submit'])) {
    $email =$_POST['txt_email'];
    $pass = $_POST['txt_pass'];

    if (!empty(trim($email)) && !empty(trim($pass))) {
        
        $query = "SELECT * FROM user_detail WHERE user_email='$email'";
        $result = mysqli_query($koneksi, $query);
        $num = mysqli_num_rows($result);

        while($row=mysqli_fetch_array($result)) {
            $id = $row ['id'];
            $userVal = $row['user_email'];
            $passVal = $row['user_password'];
            $level = $row['level'];
        }

    if ($num != 0) {
        if ($userVal==$email && $passVal==$pass) {
            // header('Location: home.php?user_fullname=' . urlencode($userName));  
            $_SESSION['id']=$id;
            $_SESSION['name']=$userName;
            $_SESSION['level']=$level;
            header('Location: home.php');  
        }else{
            $error ='user atau password salah!!';
            header('Location: login.php');
        }
        }else{
            $error ='user tidak ditemukan!';
            header('Location: login.php'); 
        }
        }else{
        $error ='Data tidak boleh kosong !!';
        echo $error;
    }
}
?>

<html>
<head>
    <title>login page</title>
    <style>
        *{
        box-sizing: border-box;
        }
        .container{
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%,-50%);
        padding: 30px 25px;
        width: 400px;
        background-color: #c8e4e6;
        border-radius: 10px;
        }
        .container h1{
            text-align: center;
            font-weight:bold;
            color: #31888c;
        }
        .container form input{
        width: calc(100% - 20px);
        padding: 10px 10px 10px 10px;
        margin-bottom: 15px;
        border: none;
        background-color: transparent;
        border-bottom: 2px solid #5bcfbf;
        color: #2b3a3b;
        font-size: 15px;
        }
        .container a{
            text-align: left;
        }
        .center{
        margin: 0;
        position: absolute;
        top: 90%;
        left: 50%;
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        }

        </style>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" 
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="container">
    <form action ="login.php" method="POST">
        <h1>LOGIN</h1>
        <p>email :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
            <input type ="text" name="txt_email"></p>
        <p>password :<input type ="password" name="txt_pass"></p><br>
        <div class="center">
        <button type="submit" name="submit" class="btn btn-info">login</button>
    </div>
    <a href="register.php" class="a">Register?</a>
    </form>
    </div>
</body>
</html>