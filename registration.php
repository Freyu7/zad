<?php
			session_start();
			if(isset($_SESSION['loged'])&& ($_SESSION['loged'] == true)){
				header("location: index.php");
				exit;
			}
			
			if(isset($_POST['nick'])){
			
				$ok = true;
			

				$nick = $_POST['nick'];
			
				if(ctype_alnum($nick)==false){
					$ok = false;
					$_SESSION['e_nick'] = "Nick może zawierać tylko litery i cyfry(bez polskich znaków)";
				}
				if((strlen($nick)<3) || (strlen($nick)>20)){
					$ok = false;
					$_SESSION['e_nick'] = "Nick musi posiadać od 3 do 20 znaków";
				}
				

				$name = htmlentities($_POST['name'], ENT_QUOTES, "UTF-8");
				
				if(ctype_alnum($name)==false){
					$ok = false;
					$_SESSION['e_name'] = "Imię może zawierać tylko litery i cyfry(bez polskich znaków)";
				}
				if((strlen($name)<2) || (strlen($name)>12)){
					$ok = false;
					$_SESSION['e_name'] = "Imię musi posiadać od 2 do 12 znaków";
				}
			

				$sname = htmlentities($_POST['sname'], ENT_QUOTES, "UTF-8");
			
				if((strlen($sname)<2) || (strlen($sname)>12)){
					$ok = false;
					$_SESSION['e_sname'] = "Nazwisko musi posiadać od 2 do 12 znaków";
				}
			
				$email = $_POST['email'];  //wyrażenia regularne//
				$emailS = filter_var($email, FILTER_SANITIZE_EMAIL);

				if((filter_var($emailS,FILTER_VALIDATE_EMAIL)==false )|| ($emailS != $email)){
					$ok = false;
					$_SESSION['e_email']="Podaj prawidłowy email";
				}
			

				$pass1 = htmlentities($_POST['pass1'], ENT_QUOTES, "UTF-8");
				$pass2 = htmlentities($_POST['pass2'], ENT_QUOTES, "UTF-8");
				

				if((strlen($pass1)<6) || (strlen($pass1)>24)){
					$ok = false;
					$_SESSION['e_pass'] = "Hasło musi posiadać od 6 do 24 znaków";
				}
				if($pass1 !== $pass2){
					$ok = false;
					$_SESSION['e_pass'] = "Podane hasła są różne";
				}

				if(!isset( $_POST['regulations'])){
					$ok = false;
					$_SESSION['e_reg'] = "Regulamin nie został zaakceptowany";
				}

				$_SESSION['rm_nick'] = $nick;
				$_SESSION['rm_email'] = $email;
				$_SESSION['rm_name'] = $name;
				$_SESSION['rm_sname'] = $sname;

				
				

				require_once "connect.php";
				mysqli_report(MYSQLI_REPORT_STRICT);

				try{
					$connect = new mysqli($host, $db_user, $db_password, $db_name);  //@ wyciszenie błędów
					if($connect->connect_errno != 0){
						throw new Exception(mysqli_connect_errno()); //rzuć wyjątkiem w przypadku problemu z połaczeniem
					}
					else{
						$result = $connect->query("SELECT id FROM users WHERE email = '$email'");
						if(!$result) throw new Exception($connect->error);
						$nr_email = $result->num_rows;
						if($nr_email>0){
							$ok = false;
							$_SESSION['e_email']="W bazie istnieje już podany email";
						}

						$result = $connect->query("SELECT id FROM users WHERE login = '$nick'");
						if(!$result) throw new Exception($connect->error);
						$nr_nick = $result->num_rows;
						if($nr_nick>0){
							$ok = false;
							$_SESSION['e_nick']="W bazie istnieje już użytkownik o podanje nazwie";		
						}
						
						if($ok == true){
							
							if($connect->query("INSERT INTO users VALUES(NULL, '$nick', '$pass1', '$email', '$name', '$sname', '2')")){
								$_SESSION['reg_sucess'] = true;
								$_SESSION['name'] = $name;
								header("location: index.php");
								// potwierdzenie rejestracji

							}
							else{
								throw new Exception($connect -> error);
							}
							
						}

						$connect->close();
					}
				}
				catch(Exception $e){//klasa będzie zawierała info o błędzie
					echo "Błąd serwera! Prosimy spróbować później.";
					echo '</br> Info dev: '.$e;
				}
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
			<form method = "post">
		
			<div class="login">
				<h3>Rejestracja: </h3>
				<input type="text" name="nick" placeholder="Nick" value = "<?php
					if(isset($_SESSION['rm_nick'])){
						echo $_SESSION['rm_nick'];
						unset($_SESSION['rm_nick']);
					}
					?>" /> <br/><br/>
				<?php 
					if(isset($_SESSION['e_nick'])) echo '<div class="error">'. $_SESSION['e_nick'].'</br></div>';
					unset($_SESSION['e_nick']);
				?>
				<input type="text" name="name" placeholder="Imię"  value = "<?php
					if(isset($_SESSION['rm_name'])){
						echo $_SESSION['rm_name'];
						unset($_SESSION['rm_name']);
					}
					?>" /> <br/><br/>
				<?php 
					if(isset($_SESSION['e_name'])) echo '<div class="error">'. $_SESSION['e_name'].'</br></div>';
					unset($_SESSION['e_name']);
				?>
				<input type="text" name="sname" placeholder="Nazwisko"  value = "<?php
					if(isset($_SESSION['rm_sname'])){
						echo $_SESSION['rm_sname'];
						unset($_SESSION['rm_sname']);
					}
					?>"/> <br/><br/>
				<?php 
					if(isset($_SESSION['e_sname'])) echo '<div class="error">'. $_SESSION['e_sname'].'</br></div>';
					unset($_SESSION['e_sname']);
				?>
				<input type="text" name="email" placeholder="E-mail" value = "<?php
					if(isset($_SESSION['rm_email'])){
						echo $_SESSION['rm_email'];
						unset($_SESSION['rm_email']);
					}
					?>" /> <br/><br/>
				<?php 
					if(isset($_SESSION['e_email'])) echo '<div class="error">'. $_SESSION['e_email'].'</br></div>';
					unset($_SESSION['e_email']);
				?>
				<input type="password" name="pass1" placeholder="Hasło" /> <br/><br/>
				<?php 
					if(isset($_SESSION['e_pass'])) echo '<div class="error">'. $_SESSION['e_pass'].'</br></div>';
					unset($_SESSION['e_pass']);
				?>
				<input type="password" name="pass2" placeholder="Powtórz hasło" /> <br/><br/>
				<label>
				<input type="checkbox" name="regulations" style = "width: 15px;" />Akceptuję regulamin
				</label><br/><br/>
				<?php 
					if(isset($_SESSION['e_reg'])) echo '<div class="error">'. $_SESSION['e_reg'].'</br></div>';
					unset($_SESSION['e_reg']);
				?>
				<input type = submit value = "Wyślij"/>
			</div>
			
			</form>
					
		<div class="right">
		</div>
		<div style="clear: both;"></div>
	</div>
	
</body>
</html>