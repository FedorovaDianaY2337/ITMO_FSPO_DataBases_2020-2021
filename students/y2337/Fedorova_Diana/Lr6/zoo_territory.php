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
			<th>ID_building</th>
			<th>Habitat period</th>
		</tr>
	<?php 
	$query = 'SELECT * FROM zoo_territory order by id_zoo_territory';
	$result = pg_query($query) or die('Ошибка запроса: ' . pg_last_error());
	while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
	    echo "\t<tr>\n";
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
		<h3 class ="mx-auto">Add new zoo territory</h3>
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
	   <label class="prefix" for="building_id" class ="mx-auto mb-5">Building</label>
	   <select id="building_id" name="building_id">
	    <option value="">choose a building</option>
	    <?php
	      $result = pg_query('SELECT * FROM building');
	      while ($row = pg_fetch_array($result))
	      {
	         echo "<option value='".$row["id_building"]."'>".$row["address"]."</option>";
	      }
	    ?>
	   </select>
		<label class="prefix" for="habitat_period" class ="mx-auto mb-5">Habitat period</label>
		<input type ="text" name ="habitat_period"></p>
		<button type = "submit" class = "btn-primary"> Add</button>
	</div>
</form>
		
		<div class ="col">
				<h3 class ="">Update</h3>
					<form  action = "update_form.php" class ="mx-auto mb-5" method="post">
							<label class="prefix" for="id_zoo_territory" class ="mx-auto mb-5">Zoo territory:</label>
		   					<select id="id_zoo_territory" name="id_zoo_territory">
						    <option value="">choose a zoo territory</option>
						    <?php
						      $result = pg_query('SELECT * FROM zoo_territory order by id_zoo_territory');
						      while ($row = pg_fetch_array($result))
						      {
						         echo "<option value='".$row["id_zoo_territory"]."'>".$row["id_zoo_territory"]."</option>";
						      }
						    ?>
						   </select>
							<button type = "submit" class = "btn-primary"> Update</button>
					</form>
			</div>
			<div class ="col">
					<h3 class ="">Delete</h3>
					<form  action = "delete.php" class ="mx-auto mb-5" method="post">
							<label class="prefix" for="id_zoo_territory" class ="mx-auto mb-5">Habitation:</label>
		   					<select id="id_zoo_territory" name="id_zoo_territory">
						    <option value="">choose a zoo territory</option>
						    <?php
						      $result = pg_query('SELECT * FROM zoo_territory order by id_zoo_territory');
						      while ($row = pg_fetch_array($result))
						      {
						         echo "<option value='".$row["id_zoo_territory"]."'>".$row["id_zoo_territory"]."</option>";
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