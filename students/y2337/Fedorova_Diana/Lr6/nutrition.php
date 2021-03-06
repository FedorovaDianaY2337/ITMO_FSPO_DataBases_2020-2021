<?php 
require_once "connect.php"
?>

<!DOCTYPE html>
<html lang = "ru">
<head>
	<meta charset="UTF-8">
	<title>Lab_6</title>
	<link rel="styledheet" href="css/style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="zoo/blocks/header.php">
</head>

<body>
	<?php require "header.php"?>
	<table class = 'table mt-4 mx-auto'  style='width: 1100px'>
		<tr class="bg-primary text-white">
			<th>ID</th>
			<th>ID_animal</th>
			<th>ID_feeding_ration</th>
			<th>Feeding time</th>
		</tr>
	<?php 
	$query = 'SELECT * FROM nutrition order by nutrition';
	$result = pg_query($query) or die('Ошибка запроса: ' . pg_last_error());
	while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
	    foreach ($line as $col_value) {
	        echo "\t\t<td>$col_value</td>\n";
	    }
	    echo "\t</tr>\n";
	}
	?>
	</table>
	<div class ="container mt-4">
	<div class ="row">
		<div class ="col">
			<form method = "POST" action = "create.php" class = "mt-4 mx-auto"> 
			<h3 class ="mx-auto">Add new nutrition</h3>
		   	<label class="prefix" for="animal_id" class ="mx-auto mb-5">Animal</label>
		   	<select id="animal_id" name="animal_id">
		    <option value="">choose an animal</option>
		    <?php
		      $result = pg_query('SELECT * FROM animals');
		      while ($row = pg_fetch_array($result))
		      {
		         echo "<option value='".$row["id_animal"]."'>".$row["name"]."</option>";
		      }
		    ?>
		   </select><br>

		   <label class="prefix" for="feeding_ration_id" class ="mx-auto mb-5">Feeding ration</label>
		   <select id="feeding_ration_id" name="feeding_ration_id">
		    <option value="">choose a feeding ration</option>
		    <?php
		      $result = pg_query('SELECT * FROM feeding_ration');
		      while ($row = pg_fetch_array($result))
		      {
		         echo "<option value='".$row["id_feeding_ration"]."'>".$row["type"]."</option>";
		      }
		    ?>
		   </select><br>
			<label class="prefix" for="feeding_time" class ="mx-auto mb-5">Time</label>
			<input type ="time" name ="feeding_time"></p>
			<button type = "submit" class = "btn-primary"> Add</button>
		
	</form>
	</div>
	<div class ="col">
					<h3 class ="">Update</h3>
						<form  action = "update_form.php" class ="mx-auto mb-5" method="post">
								<label class="prefix" for="id_nutrition" class ="mx-auto mb-5">Nutrition:</label>
			   					<select id="id_nutrition" name="id_nutrition">
							    <option value="">choose an nutrition</option>
							    <?php
							      $result = pg_query('SELECT * FROM nutrition order by id_nutrition');
							      while ($row = pg_fetch_array($result))
							      {
							         echo "<option value='".$row["id_nutrition"]."'>".$row["id_nutrition"]."</option>";
							      }
							    ?>
							   </select>
								<button type = "submit" class = "btn-primary"> Update</button>
						</form>
				</div>
	<div class ="col">
					<h3 class ="">Delete</h3>
					<form  action = "delete.php" class ="mx-auto mb-5" method="post">
							<label class="prefix" for="id_nutrition" class ="mx-auto mb-5">Habitation:</label>
		   					<select id="id_nutrition" name="id_nutrition">
						    <option value="">choose an habitation</option>
						    <?php
						      $result = pg_query('SELECT * FROM nutrition order by id_nutrition');
						      while ($row = pg_fetch_array($result))
						      {
						         echo "<option value='".$row["id_nutrition"]."'>".$row["id_nutrition"]."</option>";
						      }
						    ?>
						   </select>
							<button type = "submit" class = "btn-primary"> Delete</button>
					</form>
			</div>
	</div>
</body>
</html>
</html>
