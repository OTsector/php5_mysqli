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

// მონაცემთა ბაზის წაშლა
$sql = "DROP DATABASE mydb";

if (mysqli_query($conn, $sql)) {
    echo "მონაცემთა ბაზა წაიშალა";
} else {
    echo "დაფიქსირდა შეცდომა მონაცემთა ბაზის წაშლისას: " . mysqli_error($conn);
}

// კავშირის დასრულება
mysqli_close($conn);
?> 