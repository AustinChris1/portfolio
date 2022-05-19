<?php
include_once "../databases/db_connect.php";
include_once "../includes/authentication.php";

if ($_SESSION["auth_user"]) {

    include "header.php";
    include "navbar.php";
    $username = $_SESSION["auth_user"]["username"];
    $referrer = $_SESSION["auth_user"]["referrer"];

    if (isset($_SESSION["locked"])) {
        $diff = time() - $_SESSION["locked"];
        if ($diff > 360) {
            unset($_SESSION["locked"]);
        }
    }

    function updateMinedBalance($db, $username)
    {
        $updateBalance = $db->query(
            "SELECT * FROM spectradb WHERE username = '$username'"
        );
        // $uresult = mysqli_query($GLOBALS['con'], $updateBalance);
        if ($updateBalance) {
            if ($updateBalance->num_rows > 0) {
                $result_fetch = $updateBalance->fetch_assoc();
                $bal = $result_fetch["balance"] + 200;
                $bal_email = $result_fetch["email"];
                $update_bal = $db->query(
                    "UPDATE spectradb SET balance = '$bal' WHERE email='$bal_email'"
                );
                if (!$update_bal) {
                    $_SESSION["message"] = "Something went wrong!";
                    header("Location: refferal_stats");
                    exit();
                }
            } else {
                $_SESSION["message"] = "Falied to update";
                header("Location: refferal_stats");
                exit();
            }
        } else {
            $_SESSION["message"] = "Something went wrong!";
            header("Location: refferal_stats");
            exit();
        }
    }

    if (isset($_POST["mine"])) {
        updateMinedBalance($db, $username);
        $_SESSION["locked"] = time();

        $_SESSION["message"] = "Mined Successfully!";
        header("Location: refferal_stats");
        exit();
    }
    ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Dashboard</li>
                            
                        </ol>
                        <div class="row">

                                    <div class="card-body">Total Categories
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="category_view">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Total Categories
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="category_view">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
    </div>
</div>
</div>

<?php
}
include "footer.php";
?>
<script>
    setTimeout(function() {
        $("#loading").hide();
    }, 2100);
    setTimeout(function() {
        $(".content").show();
    }, 2000);
</script>
<script>
function myFunction() {
  var copyText = document.getElementById("myInput");
  copyText.select();
  copyText.setSelectionRange(0, 99999);
  navigator.clipboard.writeText(copyText.value);
  
  var tooltip = document.getElementById("myTooltip");
  tooltip.innerHTML = "Copied: " + copyText.value;
}

function outFunc() {
  var tooltip = document.getElementById("myTooltip");
  tooltip.innerHTML = "Copy to clipboard";
}
</script>
<style>
    .card {
        margin-top: 22vh !important;
    }

    .tooltip {
  position: relative;
  display: inline-block;
}

.tooltip .tooltiptext {
  visibility: hidden;
  width: 140px;
  background-color: #555;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 5px;
  position: absolute;
  z-index: 1;
  bottom: 150%;
  left: 50%;
  margin-left: -75px;
  opacity: 0;
  transition: opacity 0.3s;
}

.tooltip .tooltiptext::after {
  content: "";
  position: absolute;
  top: 100%;
  left: 50%;
  margin-left: -5px;
  border-width: 5px;
  border-style: solid;
  border-color: #555 transparent transparent transparent;
}

.tooltip:hover .tooltiptext {
  visibility: visible;
  opacity: 1;
}
</style>