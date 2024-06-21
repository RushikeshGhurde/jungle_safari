<?php
include "config.php";
if (isset($_REQUEST["submit"])) {
$id = $_REQUEST["id"];
$name = $_REQUEST["name"];
$date = $_REQUEST["date"];
$dob = $_REQUEST["dob"];
$phone = $_REQUEST["phone"];
$coach = $_REQUEST["Feedback"];
$ins = "INSERT INTO member (id,name, date,dob,phone,feedback) VALUES ('$id','$name','$date','$dob','$phone','$feedback')";
$query1 = mysqli_query($connection, $ins);
}
?>