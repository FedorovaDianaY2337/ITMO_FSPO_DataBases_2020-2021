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
</head>

<body>
	<?php require "header.php"?>

  <div class="container mt-4">
  	<h3 class="mb-4">Информационная модель для учета животных в зоопарке</h3>
  	<p style="text-align: justify;">Создать программную систему, предназначенную для учета животных в зоопарке.
Каждому новому питомцу зоопарка присваивается уникальный номер, имя.
Необходимо также хранить дату рождения. О птицах дополнительно необходимо
хранить сведения о месте зимовки , для рептилий необходимо хранить сведения о его нормальной
температуре. Каждому питомцу назначается рацион кормления,
который характеризуется номером, названием, типом. Каждый тип рациона может содержать несколько рационов, отличающихся по
содержанию. Рацион может со временем меняться. Необходимо знать зону обитания
животного. Каждое животное относится к одной зоне обитания. В зоопарке есть ветеринары, которые закреплены за животными. Каждый
сотрудник имеет табельный номер, ФИО, дату рождения. Каждый ветеринар может
обслуживать несколько животных, и каждое животное может обслуживаться несколькими
ветеринарами. </p>
	<p><img width="1100px" height="1250px" src="zoo.png"></p>
  </div>
</body>
</html>