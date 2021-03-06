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
			<th>Address</th>
		</tr>
	<?php 
	$query = 'SELECT * FROM building order by id_building';
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
			<h3 class ="mx-auto">Add new building</h3>
			<form  action = "create.php" class ="mx-auto mb-5" method="post">
					<p class="mt-2">Address</p>
					<input type ="text" name ="address">
					<button type = "submit" class = "btn-primary"> Add</button>
			</form>
		</div>

		<div class ="col">
			<h3 class ="">Update</h3>
				<form  action = "update_form.php" class ="mx-auto mb-5" method="post">
						<label class="prefix" for="id_building" class ="mx-auto mb-5">Building:</label>
	   					<select id="id_building" name="id_building">
					    <option value="">choose a building</option>
					    <?php
					      $result = pg_query('SELECT * FROM building order by id_building');
					      while ($row = pg_fetch_array($result))
					      {
					         echo "<option value='".$row["id_building"]."'>".$row["id_building"]."</option>";
					      }
					    ?>
					   </select>
						<button type = "submit" class = "btn-primary"> Update</button>
				</form>
		</div>
		<div class ="col">
				<h3 class ="">Delete</h3>
				<form  action = "delete.php" class ="mx-auto mb-5" method="post">
						<label class="prefix" for="id_building" class ="mx-auto mb-5">Building:</label>
	   					<select id="id_building" name="id_building">
					    <option value="">choose a building</option>
					    <?php
					      $result = pg_query('SELECT * FROM building order by id_building');
					      while ($row = pg_fetch_array($result))
					      {
					         echo "<option value='".$row["id_building"]."'>".$row["id_building"]."</option>";
					      }
					    ?>
					   </select>
						<button type = "submit" class = "btn-primary"> Delete</button>
				</form>
		</div>
	</div>
</body>
</html>


				
		