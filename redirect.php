<!DOCTYPE html>
<html>
<head>
	<title>Car2rent</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="shortcut icon" type="image/x-icon" href="img/icon.png">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:700|Raleway:400,600,700&display=swap&subset=cyrillic-ext" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Cardo:400,400i&display=swap" rel="stylesheet">
</head>
<body>
<?php 
require('connection.php');
require('header.php');
$name = $_POST['name'];
$surname = $_POST['surname'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$carid = $_POST['carid'];
$insert = "INSERT INTO `car_order` (`id`, `name`, `surname`, `email`, `phone`, `car_id`) VALUES (NULL, '$name', '$surname', '$email', '$phone', '$carid')";
$update = "UPDATE `cars` SET `status_id` = '2' WHERE id = '$carid'";
if ($name !== "" && $surname !== "" && $phone !== "" && $email !== "") {
	if (mysqli_query($connection , $insert)) {
		if (mysqli_query($connection , $update)) {
			echo '<script>
			location.href= "orderfinish.php"
			</script>';
		}
} else{ echo "error"; } 
} else { 
			echo '<script>
			history.back()
			</script>';
		} 
mysqli_close($connection);
?>
</body>
</html>