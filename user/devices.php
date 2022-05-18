<?php
include_once '../databases/db_connect.php';
include '../includes/authentication.php';
include 'header.php';
include 'navbar.php';


 
 // devices.php
  
 // session start is required for login
 if($_SESSION['auth_user']){
    if (isset($_POST["remove_device"]))
{
    // get device ID
    $id = $_POST["id"];
 
    // remove from database
    $sql = $db->query("DELETE FROM devices WHERE user_id = '" . $_SESSION['auth_user']['id'] . "' AND id = '" . $id . "'");
 
    // success message
    $_SESSION['message'] = "Device has been removed";
    header("Location: devices");
    exit(0);
}
 
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
 <div class="container-fluid px-4">
    <div class="row mt-4">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <h4>Devices </h4> 
                </div>                
                <?php include '../includes/message.php';?>

<?php
 // get all devices of logged in user
 $deviceview = $db->query("SELECT * FROM devices WHERE user_id = '" . $_SESSION['auth_user']['id']. "'");
  
 ?>
 <!-- table to show all devices data -->
 <div class="table-responsive">
    <table class="table table-bordered table-striped">    
        <tr>
        <th>Device info</th>
        <th>Last login</th>
        <th>Last location</th>
        <th>Actions</th>
    </tr>
 
    <!--  table row for each device -->
    <?php while ($row = $deviceview->fetch_object()): ?>
        <tr>
            <td><?php echo $row->browser_info; ?></td>
 
            <!-- last login date in readable format -->
            <td><?php echo date("d M, Y H:i:s A", strtotime($row->last_login)); ?></td>
            <td><?php echo $row->last_login_location; ?></td>
            <td>
                <!-- form to remove the device -->
                <form method="POST">
                    <input type="hidden" name="id" value="<?php echo $row->id; ?>">
                    <input type="submit" name="remove_device" value="Remove device" class="btn btn-danger">
                </form>
            </td>
        </tr>
    <?php endwhile; ?>
</table>
 </div>
                </div>
            </div>
        </div>
    </div>
 </div>
 <?php
 }
include 'footer.php';
?>
<script>
    setTimeout(function() {
        $("#loading").hide();
    }, 2100);
    setTimeout(function() {
        $(".content").show();
    }, 2000);
</script>
<style>
    .card {
        margin-top: 22vh !important;
    }
</style>