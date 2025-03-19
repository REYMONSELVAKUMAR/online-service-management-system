<?php
define('TITLE', 'Change Password');
define('PAGE', 'changepass');
include('includes/header.php'); 
include('../dbConnection.php');
session_start();

if(isset($_SESSION['is_adminlogin'])){
    $aEmail = $_SESSION['aEmail'];
} else {
    echo "<script> location.href='login.php'; </script>";
}

if(isset($_REQUEST['passupdate'])){
    if($_REQUEST['aOldPassword'] == "" || $_REQUEST['aNewPassword'] == "" || $_REQUEST['aConfirmPassword'] == ""){
        $passmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fields </div>';
    } else {
        $sql = "SELECT a_password FROM adminlogin_tb WHERE a_email='$aEmail'";
        $result = $conn->query($sql);
        
        if($result->num_rows == 1){
            $row = $result->fetch_assoc();
            $dbPassword = $row['a_password'];

            // Check if the old password matches
            if($_REQUEST['aOldPassword'] === $dbPassword){
                // Check if new passwords match
                if($_REQUEST['aNewPassword'] === $_REQUEST['aConfirmPassword']){
                    $aNewPassword = $_REQUEST['aNewPassword'];
                    $sql = "UPDATE adminlogin_tb SET a_password = '$aNewPassword' WHERE a_email = '$aEmail'";

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
                    <input type="email" class="form-control" id="inputEmail" value="<?php echo $aEmail ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="aOldPassword">Old Password</label>
                    <input type="password" class="form-control" id="aOldPassword" placeholder="Old Password" name="aOldPassword">
                </div>
                <div class="form-group">
                    <label for="aNewPassword">New Password</label>
                    <input type="password" class="form-control" id="aNewPassword" placeholder="New Password" name="aNewPassword">
                </div>
                <div class="form-group">
                    <label for="aConfirmPassword">Confirm New Password</label>
                    <input type="password" class="form-control" id="aConfirmPassword" placeholder="Confirm New Password" name="aConfirmPassword">
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
