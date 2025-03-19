<?php
define('TITLE', 'Change Password');
define('PAGE', 'Requesterchangepass');
include('includes/header.php');
include('../dbConnection.php');
session_start();

if(isset($_SESSION['is_login'])){
    $rEmail = $_SESSION['rEmail'];
} else {
    echo "<script> location.href='RequesterLogin.php'; </script>";
}

if(isset($_REQUEST['passupdate'])){
    if($_REQUEST['rOldPassword'] == "" || $_REQUEST['rNewPassword'] == "" || $_REQUEST['rConfirmPassword'] == ""){
        $passmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fields </div>';
    } else {
        $sql = "SELECT r_password FROM requesterlogin_tb WHERE r_email='$rEmail'";
        $result = $conn->query($sql);

        if($result->num_rows == 1){
            $row = $result->fetch_assoc();
            $dbPassword = $row['r_password'];

            // Check if old password matches
            if($_REQUEST['rOldPassword'] === $dbPassword){
                // Check if new passwords match
                if($_REQUEST['rNewPassword'] === $_REQUEST['rConfirmPassword']){
                    $rNewPassword = $_REQUEST['rNewPassword'];
                    $sql = "UPDATE requesterlogin_tb SET r_password = '$rNewPassword' WHERE r_email = '$rEmail'";

                    if($conn->query($sql) === TRUE){
                        $passmsg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Password Updated Successfully </div>';
                    } else {
                        $passmsg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Unable to Update Password </div>';
                    }
                } else {
                    $passmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> New Passwords Do Not Match </div>';
                }
            } else {
                $passmsg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Old Password is Incorrect </div>';
            }
        }
    }
}
?>

<div class="col-sm-9 col-md-10">
    <div class="row">
        <div class="col-sm-6">
            <form class="mt-5 mx-5" method="POST">
                <div class="form-group">
                    <label for="inputEmail">Email</label>
                    <input type="email" class="form-control" id="inputEmail" value="<?php echo $rEmail ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="rOldPassword">Old Password</label>
                    <input type="password" class="form-control" id="rOldPassword" placeholder="Old Password" name="rOldPassword">
                </div>
                <div class="form-group">
                    <label for="rNewPassword">New Password</label>
                    <input type="password" class="form-control" id="rNewPassword" placeholder="New Password" name="rNewPassword">
                </div>
                <div class="form-group">
                    <label for="rConfirmPassword">Confirm New Password</label>
                    <input type="password" class="form-control" id="rConfirmPassword" placeholder="Confirm New Password" name="rConfirmPassword">
                </div>
                <button type="submit" class="btn btn-danger mr-4 mt-4" name="passupdate">Update</button>
                <button type="reset" class="btn btn-secondary mt-4">Reset</button>
                <?php if(isset($passmsg)) {echo $passmsg; } ?>
            </form>
        </div>
    </div>
</div>

<?php
include('includes/footer.php'); 
?>
