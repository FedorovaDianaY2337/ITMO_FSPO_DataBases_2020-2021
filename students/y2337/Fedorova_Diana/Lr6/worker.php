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
			<th>FIO</th>
			<th>Birthday</th>
			<th>Post</th>
			<th>Email</th>
			<th>Phone number</th>
		</tr>
	<?php 
	$query = 'SELECT * FROM worker';
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
		<h3 class ="mx-auto">Add new worker</h3>
		<form  action = "create.php" class ="mx-auto mb-2" method="post">
				<p class="mt-1">FIO</p>
				<input type ="text" name ="FIO">
				<p class="mt-1">Birthday</p>
				<input type ="text" name ="birthday">
				<p class="mt-1">Post</p>
				<input type ="text" name ="post">
				<p class="mt-1">Email</p>
				<input type ="text" name ="email">
				<p class="mt-1">Phone number</p>
				<input type ="text" name ="phone">
				<button type = "submit" class = "btn-primary"> Add</button>
			</form>
		</div>
	<div class ="col">
				<h3 class ="">Update</h3>
					<form  action = "update_form.php" class ="mx-auto mb-5" method="post">
							<label class="prefix" for="id_habitation" class ="mx-auto mb-5">Worker:</label>
		   					<select id="id_worker" name="id_worker">
						    <option value="">choose a worker</option>
						    <?php
						      $result = pg_query('SELECT * FROM worker order by id_worker');
						      while ($row = pg_fetch_array($result))
						      {
						         echo "<option value='".$row["id_worker"]."'>".$row["id_worker"]."</option>";
						      }
						    ?>
						   </select>
							<button type = "submit" class = "btn-primary"> Update</button>
					</form>
			</div>
			<div class ="col">
					<h3 class ="">Delete</h3>
					<form  action = "delete.php" class ="mx-auto mb-5" method="post">
							<label class="prefix" for="id_habitation" class ="mx-auto mb-5">Worker:</label>
		   					<select id="id_habid_workeritation" name="id_worker">
						    <option value="">choose a worker</option>
						    <?php
						      $result = pg_query('SELECT * FROM worker order by id_worker');
						      while ($row = pg_fetch_array($result))
						      {
						         echo "<option value='".$row["id_worker"]."'>".$row["id_worker"]."</option>";
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