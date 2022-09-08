<?php
include 'db_conn.php';
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deposit History</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        table {
  margin: 30px 0;
}
        </style>

</head>
<body>
    <div class="container">
    <a href="home.php">Homepage</a>
    </div>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Trasaction ID</th>
      <th scope="col">Amount</th>
    </tr>
  </thead>
  <tbody>


  <?php
    include 'db_conn.php';
    $id =  $_SESSION['id'];
    $sql = "SELECT * FROM deposit WHERE userid='$id'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1) {

        $row = mysqli_fetch_assoc($result);
        echo $row['userid'];
    }
                    ?>
    <!-- <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>the Bird</td>
      <td>@twitter</td>
    </tr> -->
  </tbody>
</table>
</body>
</html>