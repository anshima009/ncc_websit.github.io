<?php
	$name = $_POST['name'];
	$email = $_POST['email'];
	$swsd = $_POST['swsd'];
	$phone = $_POST['phone'];
	$rank = $_POST['rank'];
	$year = $_POST['year'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $profession = $_POST['profession'];

	// Database connection
	$conn = new mysqli('localhost','root','','unit_ncc_database');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into alumni(name, email, swsd, rank, address, city, profession, year, phone) values(?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssssii", $name, $email, $swsd, $rank, $address, $city, $profession, $year, $phone);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>