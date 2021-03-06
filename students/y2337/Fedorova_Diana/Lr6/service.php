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
			<th>ID_worker</th>
			<th>ID_animal</th>
			<th>Service</th>
		</tr>
	<?php 
	$query = 'SELECT * FROM service';
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
		<h3 class ="mx-auto">Add new service</h3>
	   <label class="prefix" for="worker_id" class ="mx-auto mb-5">Worker</label>
	   <select id="worker_id" name="worker_id">
	    <option value="">choose a worker</option>
	    <?php
	      $result = pg_query('SELECT * FROM worker');
	      while ($row = pg_fetch_array($result))
	      {
	         echo "<option value='".$row["id_worker"]."'>".$row["fio"]."</option>";
	      }
	    ?>
	   </select><br>
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
	
		<label class="prefix" for="service" class ="mx-auto mb-5">Service</label>
		<input type ="text" name ="service"></p>
		<button type = "submit" class = "btn-primary"> Add</button>
		</div>
	</form>
		
		<div class ="col">
				<h3 class ="">Update</h3>
					<form  action = "update_form.php" class ="mx-auto mb-5" method="post">
							<label class="prefix" for="id_service" class ="mx-auto mb-5">Service:</label>
		   					<select id="id_service" name="id_service">
						    <option value="">choose a service</option>
						    <?php
						      $result = pg_query('SELECT * FROM service order by id_service');
						      while ($row = pg_fetch_array($result))
						      {
						         echo "<option value='".$row["id_service"]."'>".$row["id_service"]."</option>";
						      }
						    ?>
						   </select>
							<button type = "submit" class = "btn-primary"> Update</button>
					</form>
			</div>
			<div class ="col">
					<h3 class ="">Delete</h3>
					<form  action = "delete.php" class ="mx-auto mb-5" method="post">
							<label class="prefix" for="id_service" class ="mx-auto mb-5">Service:</label>
		   					<select id="id_service" name="id_service">
						    <option value="">choose a service</option>
						    <?php
						      $result = pg_query('SELECT * FROM service order by id_service');
						      while ($row = pg_fetch_array($result))
						      {
						         echo "<option value='".$row["id_service"]."'>".$row["id_service"]."</option>";
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