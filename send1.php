<!-- Send Registration form data -->
<?php


if (isset($_POST['name1']) && isset($_POST['email'])&& isset($_POST['phone']) && isset($_POST['safari']) && isset($_POST['adults'])&& isset($_POST['children'])&& isset($_POST['date1'])&& isset($_POST['date2'])) {
	include 'db_conn.php';

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$name1 = validate($_POST['name1']);
	$email = validate($_POST['email']);
	$phone = validate($_POST['phone']);
	$safari = validate($_POST['safari']);
	$adults = validate($_POST['adults']);
	$children = validate($_POST['children']);
	$date1= validate($_POST['date1']);
	$date2 = validate($_POST['date2']);


	if (empty($name1) ||  empty($email) || empty($phone)|| empty($safari) || empty($adults) || empty($children )|| empty($date1)|| empty($date2)) {
		header("Location: saf-booking.html");
	}else {

		$sql = "INSERT INTO saf(name1,email,phone,safari,adults,children,date1,date2) VALUES('$name1', '$email','$phone','$safari','$adults','$children','$date1','$date2')";
		$res = mysqli_query($conn, $sql);
		header("Location: index.html");
		exit();

		if ($res) {
			
0			?>

        <script>alert("Your response has been recorded THANK YOU !");</script>
		
        <?php
		}else {
			echo "Your response has not been send PLEASE TRY AGAIN !";
		}
	}


}else {
	header("Location: saf-booking.html");
}
?>
