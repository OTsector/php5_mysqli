<?php
if (isset($_GET['do'])) {
	echo "<hr \>";
	switch ($_GET['do']) {
			case 'create-db':
				$conn = mysqli_connect($servername, $username, $password);
				if (!$conn) { die("დაკავშირება ჩაიშალა: " . mysqli_connect_error()); }
				$sql = "CREATE DATABASE mydb";
				if (mysqli_query($conn, $sql)) { echo "<hr />მონაცემთა ბაზა შეიქმნა"; } else { echo "დაფიქსირდა შეცდომა მონაცემთა ბაზის შექმნისას: " . mysqli_error($conn); }
					mysqli_close($conn);
				break;

			case 'create-table':
				$conn = mysqli_connect($servername, $username, $password, $dbname);
				if (!$conn) { die("დაკავშირება ჩაიშალა: " . mysqli_connect_error()); }
				$sql = "CREATE TABLE mytable (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, firstname VARCHAR(30) NOT NULL, lastname VARCHAR(30) NOT NULL, birthdata VARCHAR(30) NOT NULL, email VARCHAR(50), reg_date TIMESTAMP)";
				if (mysqli_query($conn, $sql)) { echo "<hr />ცხრილი შეიქმნა"; } else { echo "დაფიქსირდა შეცდომა ცხრილის შექმნისას: " . mysqli_error($conn); }
				mysqli_close($conn);
				break;

			case 'delete-db':
				$conn = mysqli_connect($servername, $username, $password);
				if (!$conn) { die("დაკავშირება ჩაიშალა: " . mysqli_connect_error()); }
				$sql = "DROP DATABASE mydb";
				if (mysqli_query($conn, $sql)) { echo "<hr />მონაცემთა ბაზა($dbname) წაიშალა"; } else { echo "დაფიქსირდა შეცდომა მონაცემთა ბაზის წაშლისას: " . mysqli_error($conn); }
				mysqli_close($conn);
				break;

			case 'delete-table':
				$conn = mysqli_connect($servername, $username, $password, $dbname);
				if (!$conn) { die("დაკავშირება ჩაიშალა: " . mysqli_connect_error()); }
				$sql = "DROP TABLE mytable";
				if (mysqli_query($conn, $sql)) { echo "<hr />ცხრილი წაიშალა"; } else { echo "დაფიქსირდა შეცდომა ცხრილის წაშლისას: " . mysqli_error($conn); }
				mysqli_close($conn);
				break;

			case 'add':
				if ( isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['birthdata']) ) {
				if ( $_POST['firstname'] != "" && $_POST['lastname'] != "" && $_POST['birthdata'] != "" ) { $conn = mysqli_connect($servername, $username, $password, $dbname);
				if (!$conn) { die("დაკავშირება ჩაიშალა: " . mysqli_connect_error()); }
				$firstname = $_POST['firstname']; $lastname = $_POST['lastname']; $birthdata = $_POST['birthdata']; $email = $_POST['email']; $date = date('y-m-d');
				$sql = "INSERT INTO mytable (firstname, lastname, birthdata, email) VALUES ('$firstname', '$lastname', '$birthdata', '$email')";

				if (mysqli_query($conn, $sql)) { echo "<hr />ახალი ჩანაწერი შეიქმნა"; } else { echo "შეცდომა: " . $sql . "<br>" . mysqli_error($conn); }
				mysqli_close($conn);
				} else echo "<hr \><font color='red'>შეავსეთ ყველა ველი!</font>"; }
			break;

			case 'edit':
				if ($_GET['id']) { ?>
		რედაქტირება:
		<table>
			<tbody>
				<form method="POST" action="">
					<tr>
					<td width="50">id</td>
					<td width="120">სახელი</td>
					<td width="120">გვარი</td>
					<td width="120">დაიბადა</td>
					<td width="120">ელ. ფოსტა</td>
					<td width="120">დარეგისტრირდა</td>
					<td width="120">ოფცია</td>
					</tr>
					<tr>
						<td><?php echo $_GET['id']; ?></td>
						<td><input type="text" name="firstname" style="width: 90px" \></td>
						<td><input type="text" name="lastname" style="width: 90px" \></td>
						<td><input type="text" name="birthdata" style="width: 90px" \></td>
						<td><input type="text" name="email" style="width: 90px" \></td>
						<td><?php echo date('y-m-d H:i:s'); ?></td>
						<td><input type="submit" name="submit" value="+" style="width: 90px" \></td>
					</tr>
				</form>
			</tbody>
		</table><?php
if ( isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['birthdata']) ) {
if ( $_POST['firstname'] != "" && $_POST['lastname'] != "" && $_POST['birthdata'] != "" ) {

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) { die("დაკავშირება ჩაიშალა: " . mysqli_connect_error()); }
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$birthdata = $_POST['birthdata'];
$email = $_POST['email'];
$date = date('y-m-d');
$id = $_GET['id'];
$sql = "UPDATE mytable SET firstname='$firstname', lastname='$lastname', birthdata='$birthdata', email='$email' WHERE id='$id'";
if (mysqli_query($conn, $sql)) { echo "<hr />რედაქტირება დასრულდა"; } else { echo "შეცდომა: " . $sql . "<br>" . mysqli_error($conn); }
mysqli_close($conn);
}
else
	echo "<hr \><font color='red'>შეავსეთ ყველა ველი!</font>";
}

				}
				break;

				case 'delete';
					$id = $_GET['id'];
					$conn = mysqli_connect($servername, $username, $password, $dbname);
					if (!$conn) { die("დაკავშირება ჩაიშალა: " . mysqli_connect_error()); }
					$sql = "DELETE FROM mytable WHERE id='$id'";
					if (mysqli_query($conn, $sql)) { echo "<hr />მონაცემი წაიშალა"; } else { echo "დაფიქსირდა შეცდომა მონაცემის წაშლისას: " . mysqli_error($conn); }
					mysqli_close($conn);

			default:
				echo "";
				break;
	}
	echo "<hr \>";
}
?>