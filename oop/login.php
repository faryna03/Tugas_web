<?php
// require('koneksi.php');
// require('query.php');

// session_start();

 $koneksi = mysqli_connect("localhost", "root", "", "user");

// $obj = new crud;
if(isset($_POST['submit']) ){
    $email = $_POST['txt_email'];
    $pass = $_POST ['txt_pass'];

    // if($obj->insertData($email, $pass, $name)):
    //     header('location:home2.php?user_fullname='.urldecode($userName));
    // else:
    //     $error ='Data tidak boleh kosong!';
    //      echo $error;
    // endif;

    if (!empty (trim($email)) && !empty(trim($pass))) {
        
        $query ="SELECT * FROM user_detail WHERE user_email ='$email'";
        $result = mysqli_query($koneksi, $query);
        $num = mysqli_num_rows($result);

        while ($row = mysqli_fetch_array($result)) {
            $userVal = $row['user_email'];
            $passval = $row['user_password'];
            $username = $row['user_fullname'];
        }
        
        if ($num != 0) {
            if($userVal==$email && $passval==$pass){
                header('location:home2.php?user_fullname='.urldecode($userName));
            }else{
                $error ='user atau password salah.';
                header('Location: login.php');
            }
        }else{
            $error ='user tidak di temukan';
            header('Location: login.php');
        }
    }else{
        $error ='Data tidak boleh kosong!';
        echo $error;
    }
}

?>

<html>
<head>
    <title>login page</title>
</head>
<body>
    <form action="login.php" method="POST">
        <p>email &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input type="text" name="txt_email"></p>
        <p>password : <input type="password" name="txt_pass"></p>
        <button type="submit" name="submit">Sign In</button>
    </form>
    <p><a href="regis.php">daftar</p>
</body>
</html>