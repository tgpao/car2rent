<!DOCTYPE html>
<html>
<head>
	<title>Cars</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="shortcut icon" type="image/x-icon" href="img/icon.png">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:700|Raleway:400,600,700&display=swap&subset=cyrillic-ext" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Cardo:400,400i&display=swap" rel="stylesheet">
</head>
<body>
<?php 
require('header.php');
require('connection.php');
$result = mysqli_query($connection, "SELECT
										*
									FROM
										cars 
									INNER JOIN body ON cars.body_id = body.id_body
									INNER JOIN gearbox ON cars.gearbox_id = gearbox.id_gearbox
									INNER JOIN engine ON cars.engine_id = engine.id_engine
									INNER JOIN status ON cars.status_id = status.id_status
									WHERE id_status = 1");
?>
<!-- Cars -->
<div class="catalog">
	<div class="container">

		<?php while ($cat = mysqli_fetch_assoc($result)) { ?>
		<div class="catalog__item">
			<div class="catalog__cars">
				<img class="img" src="<?php echo $cat['img'];?>" height="150">
			</div>
			<div class="catalog__info">
				<div class="info__title">
					<?php
					echo $cat['brand'] . " " . $cat['model'];
					?>					
				</div>
				<div class="info__text">
					<?php
					echo $cat['body'];
					?>	
				</div>
				<div class="info__specs">
					<p> <img src="img/specs/snowflake.png"> кондиціонер</p>
					<?php
					echo '<img src="img/specs/gearbox.png">' . " " . $cat['gearbox'];
					?>
				</div>
			</div>
			<div class="catalog__order">
				<div class="catalog__price">
					Ціна за добу: 
					<?php
					echo $cat['price'] . " грн.";
					?>
				</div>
				<p></p>
				<form action="order.php" method="post">
					<button class="btn btn--red" name="carorder" value="<?php echo $cat['id']?>">замовити</button>
				</form>
			</div>
		</div>
		<?php } ?> 
		<div>
			<p class="addinfo">Додаткова інормація:</p>
			<p class="addinfo"> - вартість включає НДС 20%.</p>
		</div>
	</div> <!-- container -->
</div> <!-- cars -->
<!-- /Cars -->

<?php 
require('footer.php');
mysqli_close($connection);
?>
</body>
</html>