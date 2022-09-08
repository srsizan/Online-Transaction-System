<?php 

session_start();

if (isset($_SESSION['id']) && isset($_SESSION['username'])) {

 ?>

<!DOCTYPE html>

<html>

<head>

    <title>HOME</title>

    <link rel="stylesheet" type="text/css" href="style.css">

</head>

<body>
<div class="full-page">
        <div class="navbar">
            <div>
                <a href='home.php'>Online Cash</a>
            </div>
            <nav>
                <ul id='MenuItems'>
                    <li><a href="home.php">Home</a></li>
                    <li><a href="deposit.php">Deposit</a></li>
                    <li><a href="transfer.php">Money Transfer</a></li>
                    <li><a href="update.php">Contact</a></li>
                    <li><a href="history.php">History</a></li>
                    <li><a href="history.php">History</a></li>


                    <?php
                    include 'db_conn.php';
                    $id =  $_SESSION['id'];
                    $sql = "SELECT * FROM user_info WHERE id='$id'";

                    $result = mysqli_query($conn, $sql);
            
                    if (mysqli_num_rows($result) === 1) {
            
                        $row = mysqli_fetch_assoc($result);
                        $balance = $row['balance'];
                        echo "Account : ".$balance;
                    }
                    ?>

                    <li><button class='loginbtn' onclick="document.getElementById('login-           form').style.display='block'" style="width:auto;">Login</button></li>
                </ul>
            </nav>
        </div>


    <script>
        var x=document.getElementById('login');
		var y=document.getElementById('register');
		var z=document.getElementById('btn');
		function register()
		{
			x.style.left='-400px';
			y.style.left='50px';
			z.style.left='110px';
		}
		function login()
		{
			x.style.left='50px';
			y.style.left='450px';
			z.style.left='0px';
		}
	</script>
	<script>
        var modal = document.getElementById('login-form');
        window.onclick = function(event) 
        {
            if (event.target == modal) 
            {
                modal.style.display = "none";
            }
        }
    </script>

<form action="transaction.php" method="post">

        <h2>Send Money</h2>

        <?php if (isset($_GET['error'])) { ?>

            <p class="error"><?php echo $_GET['error']; ?></p>

        <?php } ?>


        <label>ReceiverID</label>

        <input type="number" name="Receiverid" placeholder="Enter Receiver Account Number"><br>



        <label>Ammount</label>

        <input type="number" name="amount" placeholder="Amount"><br>

 

        <label>Password</label>

        <input type="password" name="password" placeholder="Password"><br> 

        <button type="submit">Send Money</button>

     </form>

</body>

</html>

<?php 

}else{

     header("Location: index.php");

     exit();

}

 ?>