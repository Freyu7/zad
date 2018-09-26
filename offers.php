<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	
	<title>Pai Nieruchomości</title>
	
	<meta name="description" content="Znajdź dla siebie wynmarzone mieszkanie lub dom!" />
	<meta name="keywords" content="mieszkania, działki, dom, działka, kupno miskzania" />
	
	


	<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
	<script src="slajder.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="style.css" type="text/css" />

	

		
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.css" rel="stylesheet">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.1.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="style.css" type="text/css" />

	
	<noscript>
	Wyłączona obsługa JavaScript!
	</noscript>
																	
    <script>
    $(document).ready(function(){
        $("button").click(function(){
            $.ajax({url: "demo_test.php", success: function(result){
                $("#div1").html(result);
            }});
        });
    });
    </script>
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
					session_start();

					if(isset($_SESSION['reg_sucess'])&& ($_SESSION['reg_sucess'] == true)){
						echo "Dziękujemy za rejestrację ".$_SESSION['name'].'!';
						unset($_SESSION['reg_sucess']);			
					}


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
		
		<div class="content">

		
			

			
			
			<form action="" style= "margin: 15px 0 15px 15px;"> 
			<strong>Rodzaj nieruchomośći:  </strong>
			<select name="customers" onchange="returnwasset(this.value)" style= "margin-left: 15px;" >
			
			<option value= "">Wszyskie</option>
			
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

			$result = mysqli_query($connect, "SELECT t.Name FROM type t;");
			while ($row = $result->fetch_assoc()){
				echo "<option value= ". $row['Name'] . ">" . $row['Name'] . "</option>";
			}
			$result->close(); //aby pozbyć się niepotrzebnych wyników zapytania
		}

		//echo $login."i haslo ".$pass;
		$connect->close();
	

	
	}catch(Exception $e){//klasa będzie zawierała info o błędzie
		echo "Błąd serwera! Prosimy spróbować później.";
		echo '</br> Info dev: '.$e;
	}
			?>
			</select>
			</form>



                                                                                 
			<div class="table-responsive">          
			<table class="table">
				<thead >
				<tr>
					<th >#</th>
					<th >Nazwa</th>
					<th>Typ</th>
					<th>Miejscowść</th>
					<th>Cena</th>
					<th>Opis</th>
				</tr>
				</thead>
				<tbody id="txt">






		</div>
		
		<script>
        function returnwasset(str){
            $.ajax({
                type: "POST",
                url: "select.php",
                data: ({name: str}),
                dataType:'text',
                success: function(response){
                    document.getElementById("txt").innerHTML = response;
                }
            });
        }
		</script>

		<div class="right">
		</div>
		<div style="clear: both;"></div>
	</div>
	
</body>
</html>



<script>
$(document).ready(function(){
            $.ajax({
                type: "POST",
                url: "select.php",
                dataType:'text',
                data: ({name: ""}),
                context: document.body,
                success: function(response){
                  document.getElementById("txt").innerHTML = response;
                  }
            });
          });
		</script>
