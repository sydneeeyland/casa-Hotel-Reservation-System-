<?php
include("../backend.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Casa de Estella - Dashboard</title>

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <script src="js/1.js"></script>
  <script src="js/2.js"></script>
  <script src="js/3.js"></script>
  <style>
  @page { size: auto;  margin: 0mm; }
  table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
  }

  td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
  }

  tr:nth-child(even) {
    background-color: #dddddd;
  }
  </style>

</head>

<body id="page-top">

  <div class="row">
    <div class="col-12">
      <table>
        <tr>
          <th>Booker Name</th>
          <th>Booker Email</th>
          <th>From</th>
          <th>To</th>
          <th>Card Number</th>
          <th>CVV</th>
          <th>Online Wallet</th>
          <th>Status</th>
        </tr>
        <?php
        $sql = "SELECT * FROM booked WHERE booked_start BETWEEN '".$_SESSION['date1']."' AND '".$_SESSION['date2']."'";
        $result = mysqli_query($db, $sql);
        while($row = mysqli_fetch_array($result))
        {
        ?>
        <tr>
          <td><?php echo $row['booked_name']; ?></td>
          <td><?php echo $row['user_email']; ?></td>
          <td><?php echo $row['booked_start']; ?></td>
          <td><?php echo $row['booked_end']; ?></td>
          <td><?php echo $row['card_number']; ?></td>
          <td><?php echo $row['card_cvv']; ?></td>
          <td><?php echo $row['online_wallet']; ?></td>
          <td><?php echo $row['status']; ?></td>
        </tr>
        <?php
        }
        ?>
      </table>
    </div>
  </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>
