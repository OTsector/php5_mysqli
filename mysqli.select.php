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

$sql = ' SELECT message_id, user_name, message, posted_on FROM ' . ' (SELECT message_id, user_name, message, ' . ' DATE_FORMAT(posted_on, "%H:%i") AS posted_on ' . ' FROM chat ' . ' ORDER BY message_id DESC ' . ' LIMIT 55) AS Last55' . ' ORDER BY message_id ASC';
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    }
} else {
    echo "ცარიელია";
}

// კავშირის დასრულება
mysqli_close($conn);
?> 