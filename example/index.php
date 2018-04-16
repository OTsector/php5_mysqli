<?php
include 'config.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="styles/main.css">
</head>
<body>
	<div class="block">
		<center>
			<h1>PHP5(mysqli)&#60;&#62;Mysql მაგალითი:</h1>
		<hr \>
		<?php include 'do.php'; ?>
		<p class="menu">
			<a href="<?php echo $_SERVER['PHP_SELF']; ?>">^ მთავარი</a>
			<a href="?do=create-db">[+] მონაცემთა ბაზის შექმნა</a>
			<a href="?do=create-table">[+] ცხრილის შექმნა</a>
			<a href="?do=delete-db">[-] მონაცემთა ბაზის წაშლა</a>
			<a href="?do=delete-table">[-] ცხრილის წაშლა</a>
		</p>
		<h2>ცხრილი:</h2>
		<table>
			<tbody>
				<form method="POST" action="?do=add">
					<tr>
						<td>
<?php
$conn = mysqli_connect($servername, $username, $password, $dbname);
$sql = "SELECT id FROM mytable ORDER BY id DESC LIMIT 1";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
	while($row = mysqli_fetch_assoc($result)) {
		$id = $row["id"];
	}
} else {
    $id = 0;
}
$id++; echo $id;
mysqli_close($conn);
?>
						</td>
						<td><input type="text" name="firstname" style="width: 90px" \></td>
						<td><input type="text" name="lastname" style="width: 90px" \></td>
						<td><input type="text" name="birthdata" style="width: 90px" \></td>
						<td><input type="text" name="email" style="width: 90px" \></td>
						<td><?php echo date('y-m-d H:i:s'); ?></td>
						<td><input type="submit" name="submit" value="+" style="width: 90px" \></td>
					</tr>
				</form>
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
<?php
$conn = mysqli_connect($servername, $username, $password, $dbname);
$sql = "SELECT * FROM mytable";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
	while($row = mysqli_fetch_assoc($result)) {
		$id = $row['id'];
		$firstname = $row['firstname'];
		$lastname = $row['lastname'];
		$birthdata = $row['birthdata'];
		$email = $row['email'];
		$reg_date = $row['reg_date'];
		echo "
		<tr>
			<td>$id</td>
			<td>$firstname</td>
			<td>$lastname</td>
			<td>$birthdata</td>
			<td>$email</td>
			<td>$reg_date</td>
			<td><font title='რედაქტირება'><a href='?do=edit&id=$id'><b>+</b></a></font> | <font title='წაშლა'><a href='?do=delete&id=$id'><b>-</b></a></font></td>
			</tr>
		";
	}
}
mysqli_close($conn);
?>
				</tr>
			</tbody>
		</table>
<?php
if ( isset($_GET['add']) && isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['birthdata']) ) {
if ( $_POST['firstname'] != "" && $_POST['lastname'] != "" && $_POST['birthdata'] != "" ) {

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
	die("დაკავშირება ჩაიშალა: " . mysqli_connect_error());
}
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$birthdata = $_POST['birthdata'];
$email = $_POST['email'];
$date = date('y-m-d');
$sql = "INSERT INTO mytable (firstname, lastname, birthdata, email)
VALUES ('$firstname', '$lastname', '$birthdata', '$email')";

if (mysqli_query($conn, $sql)) {
	echo "ახალი ჩანაწერი შეიქმნა";
} else {
	echo "შეცდომა: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
}
else
	echo "<hr \><font color='red'>შეავსეთ ყველა ველი!</font>";
}
?>
		</center>
	</div>
	<br><br>
	<div class="footer">
		<center>
			&copy; 2017 by <b>07:~#</b> | <a href="https://github.com/OTsector/php5_mysqli/tree/master/example" target="_blank">https://github.com/OTsector/php5_mysqli/tree/master/example</a>
		</center>
	</div>
</body>
</html>
