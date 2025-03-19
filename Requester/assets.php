<?php
define('TITLE', 'Products');
define('PAGE', 'products');
include('includes/header.php');
include('../dbConnection.php'); 
session_start();
if($_SESSION['is_login']){
  $rEmail = $_SESSION['rEmail'];
 } else {
  echo "<script> location.href='RequesterLogin.php'; </script>";
 }
?>
<div class="container mt-5">
    <h2 class="text-center">Available Products</h2>
    <div class="row">
    <?php
        $sql = "SELECT * FROM assets_tb";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="col-md-4 mt-3">
                    <div class="card" style="background-color: #7FFFD4;"> <!-- Light green background -->
                        <div class="card-body">
                            <h5 class="card-title">' . $row["pname"] . '</h5>
                            <p class="card-text"><strong>Available: </strong>' . $row["pava"] . '</p>
                            <p class="card-text"><strong>Price: </strong>₹' . $row["psellingcost"] . '</p>
                        </div>
                        <form action="sellproduct.php" method="POST" class="d-inline">
                            <input type="hidden" name="id" value='. $row["pid"] .'>
                            <button type="submit" class="btn btn-success" name="issue" value="Issue">
                                <i class="fas fa-handshake"></i>
                            </button>
                        </form>
                    </div>
                </div>';
            }
        } else {
            echo '<p class="text-center">No Products Available</p>';
        }
    ?>
    </div>
</div>

<?php
include('includes/footer.php'); 
?>