<?php
session_start();
define('TITLE', 'Success');
// include('includes/header.php'); 
include('../dbConnection.php');?>
<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <title>
  <?php echo TITLE ?>
 </title>
 <!-- Bootstrap CSS -->
 <link rel="stylesheet" href="../css/bootstrap.min.css">

 <!-- Font Awesome CSS -->
 <link rel="stylesheet" href="../css/all.min.css">

 <!-- Custome CSS -->
 <link rel="stylesheet" href="../css/custom.css">
</head>

<body>
 <!-- Top Navbar -->
 <nav class="navbar navbar-dark fixed-top bg-danger flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="RequesterProfile.php">OSMS</a>
 </nav>

 <!-- Side Bar -->
 <div class="container-fluid mb-5 " style="margin-top:40px;">
  <div class="row">
   <nav class="col-sm-2 bg-light sidebar py-5 d-print-none">
    <div class="sidebar-sticky">
     <ul class="nav flex-column">
      <li class="nav-item">
       <a class="nav-link active " href="RequesterProfile.php">
        <i class="fas fa-user"></i>
        Profile <span class="sr-only">(current)</span>
       </a>
      </li>
      <li class="nav-item">
       <a class="nav-link " href="SubmitRequest.php">
        <i class="fab fa-accessible-icon"></i>
        Submit Request
       </a>
      </li>
      <li class="nav-item">
       <a class="nav-link " href="CheckStatus.php">
        <i class="fas fa-align-center"></i>
        Service Status
       </a>
      </li>
      <li class="nav-item">
       <a class="nav-link " href="assets.php">
        <i class="fas fa-database "></i>
        products
       </a>
      </li>
      <li class="nav-item">
       <a class="nav-link " href="Requesterchangepass.php">
        <i class="fas fa-key"></i>
        Change Password
       </a>
      </li>
      
      <li class="nav-item">
       <a class="nav-link " href="../logout.php">
        <i class="fas fa-sign-out-alt"></i>
        Logout
       </a>
      </li>
      
     </ul>
    
    </div>
   </nav>

<?php
if (isset($_SESSION['is_login'])) {
    $rEmail = $_SESSION['rEmail'];
} else {
    echo "<script> location.href='RequesterLogin.php'; </script>";
}
echo $_SESSION['myid'];
if (isset($_SESSION['myid'])) {
    $sql = "SELECT * FROM customer_tb WHERE custid = {$_SESSION['myid']}";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        echo "<div class='ml-5 mt-5'>
        <h3 class='text-center'>Customer Bill</h3>
        <table class='table'>
        <tbody>
        <tr><th>Customer ID</th><td>".$row['custid']."</td></tr>
        <tr><th>Customer Name</th><td>".$row['custname']."</td></tr>
        <tr><th>Address</th><td>".$row['custadd']."</td></tr>
        <tr><th>Product</th><td>".$row['cpname']."</td></tr>
        <tr><th>Quantity</th><td>".$row['cpquantity']."</td></tr>
        <tr><th>Price Each</th><td>".$row['cpeach']."</td></tr>
        <tr><th>Total Cost</th><td>".$row['cptotal']."</td></tr>
        <tr><th>Date</th><td>".$row['cpdate']."</td></tr>
        <tr>
          <td><form class='d-print-none'><input class='btn btn-danger' type='submit' value='Print' onClick='window.print()'></form></td>
          <td><a href='assets.php' class='btn btn-secondary d-print-none'>Close</a></td>
        </tr>
        </tbody>
        </table></div>";
    } else {
        echo "Failed to retrieve customer data.";
    }
} else {
    echo "Session ID not set.";
}

include('includes/footer.php'); 
$conn->close();
?>
