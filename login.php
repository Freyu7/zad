<?php
			session_start();
			if(isset($_SESSION['loged'])&& ($_SESSION['loged'] == true)){
				header("location: index.php");
				exit;
			}
?>	
<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	
	<title>Pai Nieruchomości</title>
	
	<meta name="description" content="Znajdź dla siebie wynmarzone mieszkanie lub dom!" />
	<meta name="keywords" content="mieszkania, działki, dom, działka, kupno miskzania" />
	

	<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.css" rel="stylesheet">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.1.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="style.css" type="text/css" />
	<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
	<script src="slajder.js"></script>
	

	<noscript>
	Wyłączona obsługa JavaScript! 
	</noscript>

</head>

<body onload="slajder()">
	
	<div class="container1">
		
		<div class="topbar">
			<a href="index.php">
			<div class = "logo">PAI
				<p style = "font-size: 16px; font-weight: 350; letter-spacing: 1px;">NIERUCHOMŚCI </p>
			</div>
			</a>
			<div onclick="Slide_left()" style="cursor:pointer; float:left; line-height: 100px;" >[ < ]</div>
			<div style = "width: 605px; float:left; text-aligne: center; margin: 0, 0 ,40px, 40px">
			
				<div class = "slajder" id=slajd onload="slajder()">1
				</div>
				<div class = "slajder" id=slajd1 onload="slajder()">2
				</div>
				<div class = "slajder" id=slajd2 onload="slajder()">3
				</div>
				
			</div>
			<div onclick="Slide_right()" style="cursor:pointer; float:left; line-height: 100px;" >[ > ]</div>
			<div style="clear: both;"></div>	
			
		</div>
		
		<div class="container">
		<div class="row">
		<div class="col-sm-3">
			<div class="sidebar-nav">
			<div class="navbar navbar-default" role="navigation">
				<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<span class="visible-xs navbar-brand" style = "color: #A2B991">PAI Nieruchomości</span>
				</div>
				<div class="navbar-collapse collapse sidebar-navbar-collapse">
				<ul class="nav navbar-nav">
					<li ><a href="#"><a href="index.php"> Stron główna </a></a></li>
					<li><a href="#"><a href="login.php"> Logowanie </a></a></li>
					<li><a href="#"><a href="registration.php"> Rejestracja </a></a></li>
					<li><a href="#"><a href="offers.php"> Lista Ofert </a></a></li>
					<li><a href="#"><a href="panel.php"> Panel administratora </a></a></li>
					<li><a href="#"><?php
					

					if(isset($_SESSION['loged'])&& ($_SESSION['loged'] == true)){
						echo '<a href = "logout.php"><b>Wyloguj</b></a>';
						
						
					}
					?></a><a></a></li>
					
				</ul>
				</div>
			</div>
			</div>
		</div>
		<div class="col-sm-9">
		
		
		
			<div class="login" id="logg">
				<h3>Zaloguj się: </h3>

				<!-- <form action="logowanie.php" method="post"> -->
	
					<br /> <input type="text" name="login" id = "login" placeholder = "Login"/>  <br />
					<br /> <input type="password" name="pass" id="pass" placeholder = "Hasło"/> <br /><br />
					<!-- <input type="submit" value="Zaloguj" /> -->
					<button onclick="myFunction()">Login</button>
				
				<!-- </form> -->

				<div id="info">
					
				</div>
				
			
				<?php
					
					if(isset($_SESSION['error']))
						echo $_SESSION['error'];
					
				?>
			</div>
			
		
		
		<div class="right">
		</div>
		<div style="clear: both;"></div>

	</div>
	

	<script src="jquery.js"></script>
	<script src="jquery-3.2.1.min.js"></script>
	   
</body>
</html>

<script>
    function myFunction(username) {
        $.post('logowanie.php', {
            login: $('#login').val(),
            pass: $('#pass').val(),
        }).done(function(data) {
            $('div#info').html(data);
        })
    }
</script>