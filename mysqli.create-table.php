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

// მონაცემთა ბაზისთვის ცხრილის შექმნა
$sql = "CREATE TABLE mytable (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
birthdata VARCHAR(30) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP
)";

if (mysqli_query($conn, $sql)) {
	echo "ცხრილი შეიქმნა";
} else {
	echo "დაფიქსირდა შეცდომა ცხრილის შექმნისას: " . mysqli_error($conn);
}

// კავშირის დასრულება
mysqli_close($conn);
?>
