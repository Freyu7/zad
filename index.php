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
		<div class="col-sm-3" >
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


					if(isset($_SESSION['loged'])&& ($_SESSION['loged'] == true)){
						echo '<a href = "logout.php"><b>Wyloguj</b></a>
						<br>'.$_SESSION['snm'];

						
						
					}
					?></a><a></a></li>
					
				</ul>
				</div>
			</div>
			</div>
		</div>
		<div class="col-sm-9">


		<div class="content">
			<?php
			if(isset($_SESSION['perm'])&& ($_SESSION['perm'] == true)){
				echo '<div class="alert alert-warning alert-dismissable fade in" style= "margin-right: 30px;">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Uwaga!</strong> Aby mieć dostęp do panelu admistratora musisz być zalogowany na konto administratora.
				</div>';
				unset($_SESSION['perm']);			
			}

			if(isset($_SESSION['reg_sucess'])&& ($_SESSION['reg_sucess'] == true)){
				echo '<div class="alert alert-warning alert-dismissable fade in" style= "margin-right: 30px;">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				Dziękujemy za rejestrację '
				.$_SESSION['name'].'!</div>';
				unset($_SESSION['reg_sucess']);			
			}

			if(!(isset($_SESSION['cookie'])&& ($_SESSION['cookie'] == false))){
				echo '<div class="alert alert-warning alert-dismissable fade in" style= "margin-right: 30px;">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				Cisateczka!</div>';
				$_SESSION['cookie'] = false;			
			}
			?>
	
		  

			<h2 style="text-align: center;">Witaj na stronie PAI Nieruchomości!</h2>
				</br>
				</br>
				<button id="addTest" class="button" type="button">Utwórz ciastko</button>


		</div> 
		</div>
		</div>
		
		<div class="right">
		</div>
		<div style="clear: both;"></div>
		
		<script type = "text/javascript">
		document.cookie = "nazwaCookie=wartoscCookie; expires=dataWygasniecia; path=/; secure";
    	function setCookie(name, val, days, path, domain, secure) {
        if (navigator.cookieEnabled) { //czy ciasteczka są włączone
            const cookieName = encodeURIComponent(name);
            const cookieVal = encodeURIComponent(val);
            let cookieText = cookieName + "=" + cookieVal;

            if (typeof days === "number") {
                const data = new Date();
                data.setTime(data.getTime() + (days * 24*60*60*1000));
                cookieText += "; expires=" + data.toGMTString();
            }

            if (path) {
                cookieText += "; path=" + path;
            }
            if (domain) {
                cookieText += "; domain=" + domain;
            }
            if (secure) {
                cookieText += "; secure";
            }

            document.cookie = cookieText;
        }
    }
    document.querySelector('#addTest').addEventListener('click', function() {
    setCookie('mojeCiasteczko', 'jegoWartosc');
    });
		</script>
	</div>
	
</body>
</html>