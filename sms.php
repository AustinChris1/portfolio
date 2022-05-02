<?php
if(isset($_POST['smslogin'])){
// Authorisation details.
$username = "austinchrisiwu@gmail.com";
$hash = "dd08e231717179133d1d49e030d4d800eb1e542f05d5ca8e8e5ac0346d81c7e2";

// Config variables. Consult http://api.txtlocal.com/docs for more info.
$test = "0";
$name = $_POST['name'];
$numbers = $_POST['num'];
$otp = mt_rand(100000,999999);
setcookie("otp", $otp);
$message = "Hey ".$name. "Your OTP is ".$otp;
// Data for text message. This is the text message data.
$sender = "API Test"; // This is who the message appears to be from.
$numbers = "44777000000"; // A single number or a comma-seperated list of numbers
$message = "This is a test message from the PHP API script.";
// 612 chars or less
// A single number or a comma-seperated list of numbers
$message = urlencode($message);
$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
$ch = curl_init('https://api.txtlocal.com/send/?');
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch); // This is the result from the API
echo "OTP sent successfully";
curl_close($ch);
}
if(isset($_POST['verify'])){
    $verotp = $_POST['otp'];
    if($verotp==$_COOKIE['otp']){
        echo "Logged In Success";
    }
    else{
        echo " Wrong OTP";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="sms.php" method="post">
<table align="center">
    <tr>
        <td>Name</td>
        <td><input type="text" name="name" placeholder="Enter your name"></td>
    </tr>
    <tr>
        <td>Phone Number</td>
        <td><input type="text" name="num" placeholder="Enter your phone number"</td>
    </tr>
    <tr>
        <td></td>
        <td><input type="submit" name="smslogin" value="login (otp)" style="background-color: blue;" ></td>
    </tr>
    <tr>
        <td>Verify OTP</td>
        <td><input type="text" name="otp" placeholder="Enter received otp"></td>
    </tr>
    <tr>
        <td></td>
        <td><input type="submit" name="verify" value="Verify SMS OTP" style="background-color: green;"></td>
    </tr>
</table>

</form>
</body>
</html>

