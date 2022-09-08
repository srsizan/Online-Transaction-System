<?php 

session_start();

if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
    include 'db_conn.php';
    $id =  $_SESSION['id'];
    $pass=$_POST['password'];

    $sql = "SELECT * FROM user_info WHERE id='$id' and password='$pass'";
    $amount=$_POST['amount'];
    $receiver=$_POST['Receiverid'];
    $result = mysqli_query($conn, $sql);
    $rsql = "SELECT * FROM user_info WHERE id='$receiver'";

    $rresult = mysqli_query($conn, $rsql);

    $row = mysqli_fetch_assoc($result);

    if (mysqli_num_rows($result) === 1 && $amount <$row['balance']) {
        $rrow = mysqli_fetch_assoc($rresult);

        $rbalance = $rrow['balance'];
        $samount=$rbalance+$amount;
        $sql="UPDATE user_info SET balance=$samount WHERE id='$receiver'";
    $result = mysqli_query($conn, $sql);

    $sbalance = $row['balance'];
    $namount= $sbalance-$amount;
    $sql="UPDATE user_info SET balance=$namount WHERE id='$id'";
    $result = mysqli_query($conn, $sql);

    $sql = "INSERT INTO `transaction` (`sender_id`, `receiver_id`, `amount`) VALUES ( '$id', '$receiver', '$amount')";
    $result = mysqli_query($conn, $sql);



    
    



    header("Location: home.php");


    }
    else
    header("Location: deposit.php?error=Password or amount is not valid");
}

 ?>
