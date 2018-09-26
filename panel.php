<?php
        session_start();
       	
		    
        if(isset($_SESSION['loged'])&& ($_SESSION['loged'] == true) && ($_SESSION['typ'] == '1')){
            
        }
        else{
             header("location: index.php");
             $_SESSION['perm'] = true;
             exit;
		}

		
			
		
	
				
		if(isset($_POST['type'])){
		
		$ok = true;	
		
		$name = htmlspecialchars($_POST['name'], ENT_QUOTES);				
		if((strlen($name)<3) || (strlen($name)>30)){
			$ok = false;
			$_SESSION['e_name'] = "Nazwa oferty musi posiadać od 3 do 30 znaków";
		}
		// echo $name."</br>";	


		$type = $_POST['type'];	
		if((strlen($type)<1) || (strlen($type)>12)){
			$ok = false;
			$_SESSION['e_type'] = "Nie wybrano typu";
		}	
		// echo $type."</br>";	


		$sname = htmlentities($_POST['place'], ENT_QUOTES, "UTF-8");	
		if((strlen($sname)<2) || (strlen($sname)>25)){
			$ok = false;
			$_SESSION['e_place'] = "Miejscowość musi posiadać od 2 do 25 znaków";
		}	
		// echo $sname."</br>";		
		
		
		$price = $_POST['price'];
		if(ctype_digit($price)==false){
			$ok = false;
			$_SESSION['e_price'] = "Cena musi być podana liczbowo(bez spacji)";
		}
		if((strlen($price)<1) || (strlen($price)>12)){
			$ok = false;
			$_SESSION['e_price'] = "Cena musi posiadać od 1 do 12 znaków";
		}
		// echo $price."</br>";
	
			
		$description = htmlentities($_POST['description'], ENT_QUOTES, "UTF-8");
		if((strlen($description)<2) || (strlen($description)>2000)){
			$ok = false;
			$_SESSION['e_description'] = "Opis musi posiadać od 3 do 2000 znaków";
		}
		// echo $description."</br>";
			

		require_once "connect.php";
		mysqli_report(MYSQLI_REPORT_STRICT);

		try{
			$connect = new mysqli($host, $db_user, $db_password, $db_name);  //@ wyciszenie błędów
			if($connect->connect_errno != 0){
				throw new Exception(mysqli_connect_errno()); //rzuć wyjątkiem w przypadku problemu z połaczeniem
			}
	
			
			if($ok == true){
				
				mysqli_query($connect,"SET AUTOCOMMIT=0");
				mysqli_query($connect,"START TRANSACTION");
				if(($connect->query("INSERT INTO `address` (`City`) VALUES ('$sname')")) &&
				($connect->query("INSERT INTO `offer` (`id_offer_status`, `offer_name`, `Price`, `description`) 
				VALUES ('1', '$name', '$price', '$description')"))){
					$offer = $connect->query("SELECT id_offer FROM `offer` ORDER BY Id_offer DESC LIMIT 1;");	 
					$address = $connect->query("SELECT Id_address FROM `address` ORDER BY Id_address DESC LIMIT 1;");		 
					$row = $address->fetch_assoc();
					$row1 = $offer->fetch_assoc();
					
					// echo "   i: ".$row['Id_address'];
					$n1 =$row['Id_address'];
					$n2 = $row1['id_offer'];
					$a = $connect->query("INSERT INTO `property` (`ID_Type`, `ID_Address`, `ID_Offer`) VALUES ('$type', '$n1', '$n2')");

				if ($a) {
					mysqli_query($connect, "COMMIT");
					$_SESSION['add'] = true;
					header("location: panel.php");
					
				} else {
					mysqli_query($connect,"ROLLBACK");
					echo "nima";
				}
					
				}

			else{
				throw new Exception($connect -> error);
			}
					
			}

				$connect->close();
			
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
	<!-- <script language="JavaScript" type="text/javascript">
	document.write("Obsługa JavaScript: TAK");
	</script> -->

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
			<div onclick="Slide_left()" style="cursor:pointer; float:left; line-height: 100px;" >[ 1 ]</div>
			<div class = "slajder" id=slajd onload="slajder()">1
			</div>
			<div class = "slajder" id=slajd1 onload="slajder()">2
			</div>
			<div class = "slajder" id=slajd2 onload="slajder()">3
			</div>
			<div onclick="Slide_right()" style="cursor:pointer; float:left; line-height: 100px;" >[ 1 ]</div>
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
				<span class="visible-xs navbar-brand">Sidebar menu</span>
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
				</div><!--/.nav-collapse -->
			</div>
			</div>
		</div>
		<div class="col-sm-9">
		<div class="content">
		
			<h2 style="text-align: center;">Strona główna!</h2>

			<form method = "post">
		
			<div class="login">

				
				<?php
				if(isset($_SESSION['add'])){
				echo '<div class="alert alert-warning alert-dismissable fade in" style= "margin-right: 30px;">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Dodano!</strong> ogłoszenie
				</div>';
				unset($_SESSION['add']);
				
				}	
				?>	
			
				<h3>Dodaj ofertę: </h3>
				<input type="text" name="name" placeholder="Nazwa oferty" value = "<?php
					if(isset($_SESSION['rm_name'])){
						echo $_SESSION['rm_name'];
						unset($_SESSION['rm_name']);
					}
					?>" /> <br/><br/>
				<?php 
					if(isset($_SESSION['e_name'])) echo '<div class="error">'. $_SESSION['e_name'].'</br></div>';
					unset($_SESSION['e_name']);
				?>
				<form action=""> 
				<select name="type" onchange="returnwasset(this.value)">
				<option value= "">Typ</option>
			    <?php
				require_once "connect.php";
				mysqli_report(MYSQLI_REPORT_STRICT);

				try{
				$connect = new mysqli($host, $db_user, $db_password, $db_name);  //@ wyciszenie błędów

				if($connect->connect_errno != 0){
					throw new Exception(mysqli_connect_errno()); //errno - nr błedu error - opis tegobłedu i szczegóły
				}
				else{
				//$result = @$connect->query("SELECT t.Name FROM type t;");

				$result = mysqli_query($connect, "SELECT t.Name, t.ID_Type FROM type t;");
				while ($row = $result->fetch_assoc()){
					echo "<option value= ". $row['ID_Type'] . ">" . $row['Name'] . "</option>";
				}
				$result->close(); //aby pozbyć się niepotrzebnych wyników zapytania
				}
				$connect->close();
			
				}catch(Exception $e){//klasa będzie zawierała info o błędzie
					echo "Błąd serwera! Prosimy spróbować później.";
					echo '</br> Info dev: '.$e;
				}
				?>
				</select>
				</form>
				</br></br>
				<?php 
					if(isset($_SESSION['e_type'])) echo '<div class="error">'. $_SESSION['e_type'].'</br></div>';
					unset($_SESSION['e_type']);
				?>

				<input type="text" name="place" placeholder="Miejscowość"  value = "<?php
					if(isset($_SESSION['rm_place'])){
						echo $_SESSION['rm_place'];
						unset($_SESSION['rm_place']);
					}
					?>"/> <br/><br/>
				<?php 
					if(isset($_SESSION['e_place'])) echo '<div class="error">'. $_SESSION['e_place'].'</br></div>';
					unset($_SESSION['e_place']);
				?>
				
				<input type="text" name="price" placeholder="Cena"  value = "<?php
					if(isset($_SESSION['rm_price'])){
						echo $_SESSION['rm_price'];
						unset($_SESSION['rm_price']);
					}
					?>"/> <br/><br/>
				<?php 
					if(isset($_SESSION['e_price'])) echo '<div class="error">'. $_SESSION['e_price'].'</br></div>';
					unset($_SESSION['e_price']);
				?>

				<textarea rows="4" cols="50" name="description" placeholder="Opis"  value ="<?php
					if(isset($_SESSION['rm_description'])){
						echo $_SESSION['rm_description'];
						unset($_SESSION['rm_description']);
					}
					?>"/></textarea></br><br/>
				<?php 
					if(isset($_SESSION['e_description'])) echo '<div class="error">'. $_SESSION['e_description'].'</br></div>';
					unset($_SESSION['e_description']);
				?>
				
				<input type = submit value = "Wyślij"/>
			</div>
			
			</form>
			

		</div> 
		</div>
		</div>
		
		<div class="right">
		</div>
		<div style="clear: both;"></div>
	</div>
	
</body>
</html>