<?php
$servername = "localhost";
$username = "root";
$password = "toor";

// კავშირის შექმნა
$conn = mysqli_connect($servername, $username, $password);

// კავშირის შემოწმება
if (!$conn) {
	die("დაკავშირება ჩაიშალა: " . mysqli_connect_error());
}

// მონაცემთა ბაზის შექმნა
$sql = "CREATE DATABASE mydb";
if (mysqli_query($conn, $sql)) {
	echo "მონაცემთა ბაზა შეიქმნა";
} else {
	echo "დაფიქსირდა შეცდომა მონაცემთა ბაზის შექმნისას: " . mysqli_error($conn);
}

// კავშირის დასრულება
mysqli_close($conn);
?>