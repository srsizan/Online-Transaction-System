<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
		.border {
			width:900px ;
            height:500px;
  			border: 5px solid black;
		}
		body {
  background-image: url('img_girl.jpg');
}
	</style>
	    <link rel="stylesheet" type="text/css" href="style.css">


</head>
<body bgcolor="ffffff">
	<form method="post" action="">
		<table class="border", align = "center">
			<tr>
				<td colspan="5" align="center"><h2>Restration Form</h2></td>
			</tr>
			<tr>
				<td>Username: </td>
				<td><input type="text" name="username" required></td>
			</tr>
			<tr>
				<td>fullname: </td>
				<td><input type="text" name="fullname" required></td>
			</tr>
			<tr>
				<td>email: </td>
				<td><input type="email" name="email" required></td>
			</tr>
			<tr>
				<td>phone: </td>
				<td><input type="number" name="phone" required></td>
			</tr>
			<tr>
				<td>nid_no: </td>
				<td><input type="number" name="nid_no" required></td>
			</tr>
			<tr>
				<td>Password : </td>
				<td><input type="text" name="password" required></td>
			</tr>
			
		    	<td><input type="submit" name="submit" value="Submit"></td></tr>		    			
		</table>
	</form>									
	<?php 
		if(isset($_POST['submit']))
		{
			$username = $_POST['username'];
			$fullname = $_POST['fullname'];
			$email = $_POST['email'];
			$phone = $_POST['phone'];
			$nid_no = $_POST['nid_no'];
			$password = $_POST['password'];
			$balance=0;


			$conn = mysqli_connect('localhost','root','','online_transaction');
			if(!$conn)
			{
				echo "error".mysqli_error();
			}
			$sql = "INSERT INTO `user_info` (`username`, `fullname`, `email`, `phone`, `nid_no`, `balance`, `password`) VALUES ('$username', '$fullname', '$email', '$phone', '$nid_no', '$balance', '$password')";
			$result = mysqli_query($conn,$sql);
			header("Location: index.php");

		}				
	?>
	<h4>already have an Account!</h4><br>
     <a href="index.php">Just Log in!</a>
</body>
</html>