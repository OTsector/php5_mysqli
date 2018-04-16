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

// ცხრილის წაშლა
$sql = "DROP TABLE mytable";

if (mysqli_query($conn, $sql)) {
    echo "ცხრილი წაიშალა";
} else {
    echo "დაფიქსირდა შეცდომა ცხრილის წაშლისას: " . mysqli_error($conn);
}

// კავშირის დასრულება
mysqli_close($conn);
?> 