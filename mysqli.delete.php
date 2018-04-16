<?php
$servername = "localhost";
$username = "root";
$password = "toor";
$dbname = "mydb";

// კავშირის შექმნა
$conn = mysqli_connect($servername, $username, $password, $dbname);

// კავშირის შემოწმება
if (!$conn) {
	die("დაკავშირება ჩაიშალა: " . mysqli_connect_error());
}

// მონაცემის წაშლა
$sql = "DELETE FROM mytable WHERE id=3";

if (mysqli_query($conn, $sql)) {
	echo "მონაცემი წაიშალა";
} else {
	echo "დაფიქსირდა შეცდომა მონაცემის წაშლისას: " . mysqli_error($conn);
}

// კავშირის დასრულება
mysqli_close($conn);
?>