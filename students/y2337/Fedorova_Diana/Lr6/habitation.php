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
			<th>ID_habitat_area</th>
		</tr>
	<?php 
	$query = 'SELECT * FROM habitation order by id_habitation';
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
	</table>
	
	<div class ="container mt-4">
	<div class ="row">
		<div class ="col">
			<form method = "POST" action = "create.php" class = "mt-4 mx-auto"> 
				<h3 class ="mx-auto">Add new habitation</h3>
			   <label class="prefix" for="animal_id" class ="mx-auto mb-5">Animal:</label>
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

				
			   <label class="prefix" for="habitat_area_id" class ="mx-auto mb-5">Habitat_area:</label>
			   <select id="habitat_area_id" name="habitat_area_id">
			    <option value="">choose a habitat_area</option>
			    <?php
			      $result = pg_query('SELECT * FROM habitat_area');
			      while ($row = pg_fetch_array($result))
			      {
			         echo "<option value='".$row["id_habitat_area"]."'>".$row["name"]."</option>";
			      }
			    ?>
			   </select>
				<button type = "submit" class = "btn-primary mx-auto"> Add</button>
			</form>
		</div>
		
		<div class ="col">
				<h3 class ="">Update</h3>
					<form  action = "update_form.php" class ="mx-auto mb-5" method="post">
							<label class="prefix" for="id_habitation" class ="mx-auto mb-5">Habitation:</label>
		   					<select id="id_habitation" name="id_habitation">
						    <option value="">choose an habitation</option>
						    <?php
						      $result = pg_query('SELECT * FROM habitation order by id_habitation');
						      while ($row = pg_fetch_array($result))
						      {
						         echo "<option value='".$row["id_habitation"]."'>".$row["id_habitation"]."</option>";
						      }
						    ?>
						   </select>
							<button type = "submit" class = "btn-primary"> Update</button>
					</form>
			</div>
			<div class ="col">
					<h3 class ="">Delete</h3>
					<form  action = "delete.php" class ="mx-auto mb-5" method="post">
							<label class="prefix" for="id_habitation" class ="mx-auto mb-5">Habitation:</label>
		   					<select id="id_habitation" name="id_habitation">
						    <option value="">choose an habitation</option>
						    <?php
						      $result = pg_query('SELECT * FROM habitation order by id_habitation');
						      while ($row = pg_fetch_array($result))
						      {
						         echo "<option value='".$row["id_habitation"]."'>".$row["id_habitation"]."</option>";
						      }
						    ?>
						   </select>
							<button type = "submit" class = "btn-primary"> Delete</button>
					</form>
			</div>
	</div>

</body>
</html>


