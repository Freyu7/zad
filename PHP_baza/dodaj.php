<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	
	<title>Pai Nieruchomości</title>
	
	<meta name="description" content="Tani i bezpieczny w którym szybko i bezproblemów zrobisz wszystkie konieczne tranzakcje!" />
	<meta name="keywords" content="bank, przelewy, tarnzakcje, konto bankowe, pożyczki" />
	
	<link rel="stylesheet" href="style.css" type="text/css" />
</head>

<body>
	
	<div class="container">
		
		<div class="topbar">
			<h2>Pai Nieruchomości</h2>
			
		</div>
		
		<div class="nav"> 
			<b>Nawigacja</b> <br/>
			<a href="index.html"> Stron główna </a> <br/>
			<a href="login.html"> Logowanie </a> <br/>
			<a href="registration.html"> Rejestracja </a>
		</div>
		
		<div class="content">
		<?php

	require_once "connect.php";
	
	$connect = new mysqli($host, $db_user, $db_password, $db_name);
	
	if ($connect->connect_errno!=0) {
		echo "Error: ".$connect->connect_errno." Opis ".$connect->connect_error;
	} else {
		$imie = $_POST['imie'];
		$nazwisko = $_POST['nazwisko'];
		
		$sql = "INSERT INTO uzytkownicy VALUES (NULL, '$imie', '$nazwisko')";
		
		if ($result = @$connect->query($sql)) {
			echo "Dodano uzytkownika";
			echo "<a href='index.html'>Cofnij</a>";
		}
		$connect->close();
	}
	
?>
			
		</div>
		
		<div class="right">
		</div>
		<div style="clear: both;"></div>
	</div>
	
</body>
</html>
