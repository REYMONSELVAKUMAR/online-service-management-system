<?php
define('TITLE', 'Requester Profile');
define('PAGE', 'RequesterProfile');
include('includes/header.php'); 
include('../dbConnection.php');
session_start();
if($_SESSION['is_login']){
  $rEmail = $_SESSION['rEmail'];
} else {
  echo "<script> location.href='RequesterLogin.php'; </script>";
}

// Fetch existing user data from the database
$sql = "SELECT * FROM requesterlogin_tb WHERE r_email='$rEmail'";
$result = $conn->query($sql);
if($result->num_rows == 1){
  $row = $result->fetch_assoc();
  $rName = $row["r_name"];
  $rFullName = $row["r_fullname"];
  $rPhoneNo = $row["r_phoneno"];
  $rDOB = $row["r_dateofbirth"];
  $rAddress = $row["r_address"];
  $rZipCode = $row["r_zipcode"];
  $rCountry = $row["r_country"];
  $rPreferredLanguage = $row["r_preferedlanguage"];
  $rRecoveryEmail = $row["r_recoveryemail"];
}

// Handle form submission
if(isset($_REQUEST['update'])){
  if(empty($_REQUEST['rName'])){
    $passmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Name field is required </div>';
  } else {
    // Get updated values from the form
    $rName = $_REQUEST["rName"];
    $rFullName = $_REQUEST["rFullName"];
    $rPhoneNo = $_REQUEST["rPhoneNo"];
    $rDOB = $_REQUEST["rDOB"];
    $rAddress = $_REQUEST["rAddress"];
    $rZipCode = $_REQUEST["rZipCode"];
    $rCountry = $_REQUEST["rCountry"];
    $rPreferredLanguage = $_REQUEST["rPreferredLanguage"];
    $rRecoveryEmail = $_REQUEST["rRecoveryEmail"];

    // Update database with new data
    $sql = "UPDATE requesterlogin_tb SET 
            r_name = '$rName', 
            r_fullname = '$rFullName', 
            r_phoneno = '$rPhoneNo', 
            r_dateofbirth = '$rDOB', 
            r_address = '$rAddress', 
            r_zipcode = '$rZipCode', 
            r_country = '$rCountry', 
            r_preferedlanguage = '$rPreferredLanguage', 
            r_recoveryemail = '$rRecoveryEmail'
            WHERE r_email = '$rEmail'";

    if($conn->query($sql) == TRUE){
      $passmsg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Updated Successfully </div>';
    } else {
      $passmsg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Unable to Update </div>';
    }
  }
}
?>

<div class="container mt-5">
  <!-- Edit Button in Top Center -->
  <div class="text-center mb-3">
    <button id="editButton" class="btn btn-danger">Edit Details</button>
  </div>

  <!-- Profile Form -->
  <div class="col-sm-6 mx-auto">
    <form class="mx-5" method="POST">
      <!-- Email field -->
      <div class="form-group">
        <label for="inputEmail">Email</label>
        <input type="email" class="form-control" id="inputEmail" value="<?php echo $rEmail ?>" readonly>
      </div>
      
      <!-- Name field -->
      <div class="form-group">
        <label for="inputName">User Name</label>
        <input type="text" class="form-control" id="inputName" name="rName" value="<?php echo $rName ?>" readonly>
      </div>

      <!-- Full Name field -->
      <div class="form-group">
        <label for="inputFullName">Full Name</label>
        <input type="text" class="form-control" id="inputFullName" name="rFullName" value="<?php echo $rFullName ?>" readonly>
      </div>

      <!-- Phone Number field -->
      <div class="form-group">
        <label for="inputPhoneNo">Phone Number</label>
        <input type="text" class="form-control" id="inputPhoneNo" name="rPhoneNo" value="<?php echo $rPhoneNo ?>" readonly>
      </div>

      <!-- Date of Birth field -->
      <div class="form-group">
        <label for="inputDOB">Date of Birth</label>
        <input type="date" class="form-control" id="inputDOB" name="rDOB" value="<?php echo $rDOB ?>" readonly>
      </div>

      <!-- Address field -->
      <div class="form-group">
        <label for="inputAddress">Address</label>
        <input type="text" class="form-control" id="inputAddress" name="rAddress" value="<?php echo $rAddress ?>" readonly>
      </div>

      <!-- Zip Code field -->
      <div class="form-group">
        <label for="inputZipCode">Zip Code</label>
        <input type="text" class="form-control" id="inputZipCode" name="rZipCode" value="<?php echo $rZipCode ?>" readonly>
      </div>

      <!-- Country field -->
      <div class="form-group">
        <label for="inputCountry">Country</label>
        <input type="text" class="form-control" id="inputCountry" name="rCountry" value="<?php echo $rCountry ?>" readonly>
      </div>

      <!-- Preferred Language field -->
      <div class="form-group">
        <label for="inputPreferredLanguage">Preferred Language</label>
        <input type="text" class="form-control" id="inputPreferredLanguage" name="rPreferredLanguage" value="<?php echo $rPreferredLanguage ?>" readonly>
      </div>

      <!-- Recovery Email field -->
      <div class="form-group">
        <label for="inputRecoveryEmail">Recovery Email</label>
        <input type="email" class="form-control" id="inputRecoveryEmail" name="rRecoveryEmail" value="<?php echo $rRecoveryEmail ?>" readonly>
      </div>

      <!-- Update button -->
      <button type="submit" class="btn btn-danger" name="update" id="updateButton" style="display: none;">Update</button>
      
      <!-- Display message after form submission -->
      <?php if(isset($passmsg)) {echo $passmsg; } ?>
    </form>
  </div>
</div>

<script>
  // Make form fields editable on clicking the Edit button
  document.getElementById('editButton').addEventListener('click', function() {
    // Remove readonly attribute from inputs
    document.getElementById('inputName').removeAttribute('readonly');
    document.getElementById('inputFullName').removeAttribute('readonly');
    document.getElementById('inputPhoneNo').removeAttribute('readonly');
    document.getElementById('inputDOB').removeAttribute('readonly');
    document.getElementById('inputAddress').removeAttribute('readonly');
    document.getElementById('inputZipCode').removeAttribute('readonly');
    document.getElementById('inputCountry').removeAttribute('readonly');
    document.getElementById('inputPreferredLanguage').removeAttribute('readonly');
    document.getElementById('inputRecoveryEmail').removeAttribute('readonly');

    // Show the Update button
    document.getElementById('updateButton').style.display = 'inline-block';
  });
</script>

<?php
include('includes/footer.php'); 
?>