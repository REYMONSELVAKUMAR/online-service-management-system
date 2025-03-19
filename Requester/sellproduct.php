<?php    
define('TITLE', 'Sell Product');
define('PAGE', 'assets');
include('includes/header.php'); 
include('../dbConnection.php');
session_start();

if (isset($_SESSION['is_login'])) {
    $rEmail = $_SESSION['rEmail'];
} else {
    echo "<script> location.href='RequesterLogin.php'; </script>";
}

if (isset($_REQUEST['psubmit'])) {
    if (empty($_REQUEST['cname']) || empty($_REQUEST['cadd']) || empty($_REQUEST['pname']) || empty($_REQUEST['pquantity']) || empty($_REQUEST['psellingcost']) || empty($_REQUEST['selldate'])) {
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fields </div>';
    } else {
        $pid = $_REQUEST['pid'];
        $pava = ($_REQUEST['pava'] - $_REQUEST['pquantity']);

        // Customer Information
        $custname = $_REQUEST['cname'];
        $custadd = $_REQUEST['cadd'];
        $cpname = $_REQUEST['pname'];
        $cpquantity = $_REQUEST['pquantity'];
        $cpeach = $_REQUEST['psellingcost'];
        $cpdate = $_REQUEST['selldate'];

        // Calculate total cost in backend
        $cptotal = $cpquantity * $cpeach;

        // Insert customer data into customer_tb
        $sqlin = "INSERT INTO customer_tb (custname, custadd, cpname, cpquantity, cpeach, cptotal, cpdate) 
                  VALUES ('$custname', '$custadd', '$cpname', '$cpquantity', '$cpeach', '$cptotal', '$cpdate')";
        
        if ($conn->query($sqlin) === TRUE) {
            $genid = $conn->insert_id;  // Get the last inserted ID
            $_SESSION['myid'] = $genid;  // Set session with the generated customer ID
            
            // Update available quantity in assets_tb
            $sql = "UPDATE assets_tb SET pava = '$pava' WHERE pid = '$pid'";
            if ($conn->query($sql) === TRUE) {
                echo "<script> location.href='productsellsuccess.php'; </script>";
            } else {
                echo "Failed to update product availability.";
            }
        } else {
            echo "Failed to insert customer data.";
        }
    }
}
?>
<!-- Form and HTML structure -->
<div class="col-sm-6 mt-5 mx-3 jumbotron">
  <h3 class="text-center">Enter your Requirements details</h3>
  <?php
 if (isset($_REQUEST['issue'])) {
  $sql = "SELECT * FROM assets_tb WHERE pid = {$_REQUEST['id']}";
  $result = $conn->query($sql);
  if ($result->num_rows == 1) {
      $row = $result->fetch_assoc();
  }
 }
 ?>
 <form id="sellProductForm" method="POST">
    <!-- Product and Customer Details Form -->
    <div class="form-group">
      <label for="pid">Product ID</label>
      <input type="text" class="form-control" id="pid" name="pid" value="<?php if(isset($row['pid'])) {echo $row['pid']; }?>" readonly>
    </div>
    <div class="form-group">
      <label for="cname">Customer Name</label>
      <input type="text" class="form-control" id="cname" name="cname">
    </div>
    <div class="form-group">
      <label for="cadd">Customer Address</label>
      <input type="text" class="form-control" id="cadd" name="cadd">
    </div>
    <div class="form-group">
      <label for="pname">Product Name</label>
      <input type="text" class="form-control" id="pname" name="pname" value="<?php if(isset($row['pname'])) {echo $row['pname']; }?>" readonly>
    </div>
    <div class="form-group">
      <label for="pava">Available</label>
      <input type="text" class="form-control" id="pava" name="pava" value="<?php if(isset($row['pava'])) {echo $row['pava']; }?>" readonly>
    </div>
    <div class="form-group">
      <label for="pquantity">Quantity</label>
      <input type="number" class="form-control" id="pquantity" name="pquantity" oninput="calculateTotalCost()" min="1">
    </div>
    <div class="form-group">
      <label for="psellingcost">Price Each</label>
      <input type="text" class="form-control" id="psellingcost" name="psellingcost" value="<?php if(isset($row['psellingcost'])) {echo $row['psellingcost']; }?>" readonly>
    </div>
    <div class="form-group col-md-4">
      <label for="selldate">Date</label>
      <input type="date" class="form-control" id="selldate" name="selldate">
    </div>
    <div class="text-center">
      <button type="submit" class="btn btn-danger" name="psubmit">Submit</button>
      <a href="assets.php" class="btn btn-secondary">Close</a>
    </div>
    <?php if(isset($msg)) {echo $msg; } ?>
  </form>
</div>

<?php
include('includes/footer.php'); 
?>  

<script>
// Function to calculate total cost
function calculateTotalCost() {
    const quantity = document.getElementById('pquantity').value;
    const priceEach = document.getElementById('psellingcost').value;
    const totalCost = quantity * priceEach;

    // You can display or use totalCost as needed
    console.log('Total Cost:', totalCost);
}
</script>