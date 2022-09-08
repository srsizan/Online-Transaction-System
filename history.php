<?php 

session_start();

if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
    include 'db_conn.php';
    $id =  $_SESSION['id'];
    $pass=$_POST['password'];

    $sql = "SELECT * FROM user_info WHERE id='$id' and password='$pass'";

    $result = mysqli_query($conn, $sql);
$amount=$_POST['amount'];

    if (mysqli_num_rows($result) === 1) {

        $row = mysqli_fetch_assoc($result);
        $balance = $row['balance'];
        $samount=$balance+$amount;
        echo "Account : ".$balance;
        $sql="UPDATE user_info SET balance=$samount WHERE id='$id'";


    $result = mysqli_query($conn, $sql);
    $sql = "INSERT INTO `deposit` (`userid`,`amount`) VALUES ( '$id', '$amount')";
    $result = mysqli_query($conn, $sql);
    header("Location: home.php");



    }
    else
    header("Location: deposit.php?error=Password or amount is not valid");
}

 ?>
