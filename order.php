<!DOCTYPE html>
<html>
<head>
	<title>Order</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="shortcut icon" type="image/x-icon" href="img/icon.png">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:700|Raleway:400,600,700&display=swap&subset=cyrillic-ext" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Cardo:400,400i&display=swap" rel="stylesheet">
</head>
<body>
<?php
require ('header.php');
require('connection.php');
$carid = $_POST['carorder'];
$result = mysqli_query($connection, "SELECT
										*
									FROM
										cars 
									INNER JOIN body ON cars.body_id = body.id_body
									INNER JOIN gearbox ON cars.gearbox_id = gearbox.id_gearbox
									INNER JOIN engine ON cars.engine_id = engine.id_engine
									INNER JOIN status ON cars.status_id = status.id_status
									WHERE id = '$carid'");
$cat = mysqli_fetch_assoc($result);
?>

<div class="registration">
	<div class="container">
		<div class="registration__item">
			<div class="registration__car">				
				<img src="<?php echo $cat['img'] ?>">
				<h1 class="registration__carmodel"><?php echo $cat['brand'] . " " . $cat['model']; ?></h1>

				<p class="registration__title">Інформація про авто</p>
				<p class="registration__specs"><img src="img/specs/snowflake.png"> кондиціонер</p>
				<p class="registration__specs"><img class="engine" src="img/specs/engine.png"> <?php echo $cat['engine']; ?></p>
				<p class="registration__specs"><img src="img/specs/gearbox.png"> <?php echo $cat['gearbox'] ?></p>
				<p class="registration__specs"><img src="img/specs/door.png"> 4 двері</p>

				<p class="registration__title">Cтатус автомобіля</p>
				<p class="registration__specs"> <?php echo $cat['status'] ?> </p>

				<p class="registration__title">Мінімальний вік</p>
				<p class="registration__specs">21 рік</p>

				<p class="registration__title">Мінімальний стаж водіння</p>
				<p class="registration__specs">2 роки</p>
			</div>

			<div class="registration__client">
				<h1 class="client__title">Ваші дані</h1>
				<div class="client__data">
					<form action="redirect.php" method="post">
					 	<p class="client__title">Ім'я водія</p>

					 	<div class="client__row">
					 		<div>
					 			Ім'я
					 		</div>
					 		<div>
					 			<input class="row__input" type="text" name="name">
					 		</div>
					 	</div>

					 	<div class="client__row">
					 		<div>
					 			Прізвище
					 		</div>
					 		<div>
					 			<input class="row__input" type="text" name="surname">
					 		</div>
					 	</div>

					 	<p class="client__title">Контактні дані</p>

					 	<div class="client__row">
					 		<div>
					 			Телефон
					 		</div>
					 		<div>
					 			<input class="row__input" type="text" name="phone">
					 		</div>
					 	</div>

					 	<div class="client__row">
					 		<div>
					 			E-mail
					 		</div>
					 		<div>
					 			<input class="row__input" type="text" name="email">
					 		</div>
					 	</div>

					 	<div class="order">
					 	<button class="btn btn--red" name = "carid" value="<?php echo $carid; ?>">офромити замовлення</button>					 	
					 	</div>

					</form>
				</div>
			</div>
		</div> <!-- registration__item -->
	</div> <!-- container -->
</div> <!-- registration -->

<?php
require ('footer.php');
mysqli_close($connection);
?>
</body>
</html>