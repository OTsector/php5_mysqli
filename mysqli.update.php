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

// შეიცვალოს მონაცემი ID_ის მიხედვით
$sql = "UPDATE mytable SET lastname='Doe' WHERE id=2";

if (mysqli_query($conn, $sql)) {
    echo "ჩანაწერი შეიცვალა";
} else {
    echo "დაფიქსირდა შეცდომა ჩანაწერის შეცვლისას: " . mysqli_error($conn);
}

// კავშირის დასრულება
mysqli_close($conn);
?> 