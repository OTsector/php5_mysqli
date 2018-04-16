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

$sql = "INSERT INTO mytable (firstname, lastname, birthdata, email)
VALUES ('John', 'Doe', '1996-15-03', 'john@example.com')";

if (mysqli_query($conn, $sql)) {
    echo "ახალი ჩანაწერი შეიქმნა";
} else {
    echo "შეცდომა: " . $sql . "<br>" . mysqli_error($conn);
}

// კავშირის დასრულება
mysqli_close($conn);
?> 