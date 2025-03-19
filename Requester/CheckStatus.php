<?php
define('TITLE', 'Status');
define('PAGE', 'CheckStatus');
include('includes/header.php'); 
include('../dbConnection.php');
session_start();
if($_SESSION['is_login']){
    $rEmail = $_SESSION['rEmail'];
} else {
    echo "<script> location.href='RequesterLogin.php'; </script>";
}

// Fetch user's request IDs
$userRequests = [];
$stmt = $conn->prepare("SELECT request_id FROM assignwork_tb WHERE requester_email = ?");
$stmt->bind_param("s", $rEmail);
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    $userRequests[] = $row['request_id'];
}

?>
<div class="col-sm-6 mt-5 mx-3">
  <form action="" class="mt-3 form-inline d-print-none">
    <div class="form-group mr-3">
      <label for="checkid">Enter Request ID: </label>
      <input type="text" class="form-control ml-3" id="checkid" name="checkid" onkeypress="isInputNumber(event)">
    </div>
    <button type="submit" class="btn btn-danger">Search</button>
  </form>

  <?php
  if (isset($_REQUEST['checkid'])) {
      $requestedId = $_REQUEST['checkid'];
      // Check if the requested ID belongs to the user
      if (in_array($requestedId, $userRequests)) {
          $stmt = $conn->prepare("SELECT * FROM assignwork_tb WHERE request_id = ?");
          $stmt->bind_param("i", $requestedId);
          $stmt->execute();
          $result = $stmt->get_result();
          $row = $result->fetch_assoc();

          if ($row) { ?>
              <h3 class="text-center mt-5">Assigned Work Details</h3>
              <table class="table table-bordered">
                  <tbody>
                      <tr><td>Request ID</td><td><?php echo htmlspecialchars($row['request_id']); ?></td></tr>
                      <tr><td>Request Info</td><td><?php echo htmlspecialchars($row['request_info']); ?></td></tr>
                      <tr><td>Request Description</td><td><?php echo htmlspecialchars($row['request_desc']); ?></td></tr>
                      <tr><td>Name</td><td><?php echo htmlspecialchars($row['requester_name']); ?></td></tr>
                      <tr><td>Address Line 1</td><td><?php echo htmlspecialchars($row['requester_add1']); ?></td></tr>
                      <tr><td>Address Line 2</td><td><?php echo htmlspecialchars($row['requester_add2']); ?></td></tr>
                      <tr><td>City</td><td><?php echo htmlspecialchars($row['requester_city']); ?></td></tr>
                      <tr><td>State</td><td><?php echo htmlspecialchars($row['requester_state']); ?></td></tr>
                      <tr><td>Pin Code</td><td><?php echo htmlspecialchars($row['requester_zip']); ?></td></tr>
                      <tr><td>Email</td><td><?php echo htmlspecialchars($row['requester_email']); ?></td></tr>
                      <tr><td>Mobile</td><td><?php echo htmlspecialchars($row['requester_mobile']); ?></td></tr>
                      <tr><td>Assigned Date</td><td><?php echo htmlspecialchars($row['assign_date']); ?></td></tr>
                      <tr><td>Technician Name</td><td><?php echo htmlspecialchars($row['assign_tech']); ?></td></tr>
                      <tr><td>Technician Contact Number</td><td>
                          <?php
                          $techName = $row['assign_tech'];
                          $stmt1 = $conn->prepare("SELECT empMobile FROM technician_tb WHERE empName = ?");
                          $stmt1->bind_param("s", $techName);
                          $stmt1->execute();
                          $result1 = $stmt1->get_result();
                          $techRow = $result1->fetch_assoc();
                          echo htmlspecialchars($techRow['empMobile']);
                          ?>
                      </td></tr>
                  </tbody>
              </table>
              <div class="text-center">
                  <form class="d-print-none d-inline mr-3">
                      <input class="btn btn-danger" type="submit" value="Print" onClick="window.print()">
                  </form>
                  <form class="d-print-none d-inline" action="work.php">
                      <input class="btn btn-secondary" type="submit" value="Close">
                  </form>
              </div>
          <?php } else {
              echo '<div class="alert alert-dark mt-4" role="alert">Your Request is Still Pending...</div>';
          }
      } else {
          echo '<div class="alert alert-danger mt-4" role="alert">Access Denied: You can only view your own requests.</div>';
      }
  }
  ?>
</div>

<!-- Request IDs on the Right Side -->
<div class="col-sm-3 mt-5" style="position: absolute; top: 100px; right: 0;">
  <div class="request-id-section" style="border-radius: 10px; padding: 20px; background-color: #e9f7ef; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);">
      <h5 style="color: #28a745; font-weight: bold;">Your Request IDs</h5>
      <?php foreach ($userRequests as $requestId): ?>
          <div style="background-color: #ffffff; border: 1px solid #c3e6cb; border-radius: 5px; padding: 8px; margin-bottom: 10px; text-align: center;">
              <span style="color: #28a745; font-weight: bold;"><?php echo htmlspecialchars($requestId); ?></span>
          </div>
      <?php endforeach; ?>
  </div>
</div>

<script>
  function isInputNumber(evt) {
      var ch = String.fromCharCode(evt.which);
      if (!(/[0-9]/.test(ch))) {
          evt.preventDefault();
      }
  }
</script>

<?php
include('includes/footer.php'); 
?>