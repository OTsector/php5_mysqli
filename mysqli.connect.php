<?php
$servername = "localhost";
$username = "root";
$password = "toor";
//$dbname = "mydb"; // მონაცემთა ბაზის არსებობის შემთხვევაში

// კავშირის შექმნა
$conn = mysqli_connect($servername, $username, $password);

//$conn = mysqli_connect($servername, $username, $password, $dbname); // მონაცემთა ბაზის არსებობის შემთხვევაში

// კავშირის შემოწმება
if (!$conn) {
	die("კავშირი ჩაიშალა: " . mysqli_connect_error());
}

echo "კავშირი შედგა";
?>