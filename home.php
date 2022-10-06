<?php
require ("koneksi.php");
// $name =$_GET['user_fullname'];

session_start();

if (!isset($_SESSION['id'])){
    $_SESSION['msg'] ='anda harus login untuk mengakses halaman ini';
    header('Location: login.php');    
}
$sesID = $_SESSION['id'];
$sesName = $_SESSION['name'];
$sesLvl =$_SESSION['level'];
?>

<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" 
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
table td, table thead {
  border: 1px solid #ddd;
  padding: 8px;
}

table tr:nth-child(even){background-color: #f2f2f2;}

table tr:hover {background-color: #ddd;}

table thead {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #5bcfbf;
  color: white;
  text-align:center;
  font-weight:bold;
}
    </style>
</head>
<body>
    <h1>Selamat Datang<?php echo $sesName;?></h1>
    <!-- <h2>Selamat Datang</h2> -->

    <table class="table">
        <thead>
            <td>No</td>
            <td>Email</td>
            <td>Nama</td>
            <td>Aksi</td>
    </thead>
        <?php
            $query ="SELECT * FROM user_detail";
            $result = mysqli_query($koneksi,$query);
            $no = 1;

            if($sesLvl == 1){
                $dis ="";
            }else{
                $dis ="disbaled";
            }

            while ($row = mysqli_fetch_array($result)){
                $userMail = $row ['user_email'];
                $userName = $row ['user_fullname'];
            ?>
        <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $userMail; ?></td>
            <td><?php echo $userName; ?></td>
            <td><a href="edit.php?id=<?php echo $row['id']; ?>">
                <input type="button" value="edit"<?php echo $dis; ?>></a>
            <a href="hapus.php?id=<?php echo $row['id']; ?>">
                <input type="button" value="hapus" <?php echo $dis; ?>> </a>
            </td>
         </tr>
        <?php
        $no++;    
        } ?>
</table>
<p><a href= "logout.php">logout</p>
</body>
</html>

        