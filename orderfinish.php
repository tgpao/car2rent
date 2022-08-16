<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="shortcut icon" type="image/x-icon" href="img/icon.png">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:700|Raleway:400,600,700&display=swap&subset=cyrillic-ext" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Cardo:400,400i&display=swap" rel="stylesheet">
</head>
<body>

<?php
require('header.php');
require('connection.php');
?>

<div class="thx">
	<div class="container">
		<div class="thx__item">
			<div class="thx__inner">
				<div class="thx__title">
					<h1>Дякуємо</h1>
				</div>
				<div class="thx__text">
					<?php
					$orderid = mysqli_query($connection, "SELECT MAX(id) FROM car_order");
					$cat = mysqli_fetch_assoc($orderid);
					?>
				<h4>Ваше замовлення № <?php echo $cat['MAX(id)'];?>. Найблищим часом наш менеджер з Вами зв'яжеться.</h4>
				</div>
				<form action="index.php">
				<button class="btn btn--red" href="">Повернутися на головну</button>
				</form>
			</div>
		</div>
	</div>	
</div>

<?php mysqli_close($connection);?>

</body>
</html>