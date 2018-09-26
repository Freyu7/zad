		<?php
			session_start();
			if((!isset( $_POST['login'])) ||  (!isset($_POST['pass']))){
				header("location:login.php");
				exit;
			}
			


			require_once "connect.php";
			mysqli_report(MYSQLI_REPORT_STRICT);

			try{
			$connect = new mysqli($host, $db_user, $db_password, $db_name);  //@ wyciszenie błędów

			if($connect->connect_errno != 0){
				throw new Exception(mysqli_connect_errno()); //errno - nr błedu error - opis tegobłedu i szczegóły
			}
			else{						
				$login = $_POST['login'];
				$pass = $_POST['pass'];

				$login = htmlentities($login, ENT_QUOTES, "UTF-8");  //encja, cudzyslowy i apostrofy
				$pass = htmlentities($pass, ENT_QUOTES, "UTF-8");				

				$result = @$connect->query(sprintf("SELECT * FROM users WHERE login = '%s' AND pass = '%s'", 
				mysqli_escape_string($connect,$login), ///wykrywanie probu wstrzykniecia sql a glownie --
				mysqli_escape_string($connect, $pass))); //nie wykona się gdy bład  w zapytaniu brak uzytkownika nie będzie błedu
				if(!$result) throw new Exception($connect->error);
					else{
					$users = $result->num_rows;
					if($users > 0){
						$_SESSION['loged'] = true;
						$row = $result->fetch_assoc(); //kojarzenie indexow wyciagnietej tablicy z nazwami
						$_SESSION['user'] = $row['login'];
						$_SESSION['typ'] = $row['typ'];
						$_SESSION['snm'] = $row['nazwisko'];
						//header('Location:index.php'); // przekierowanie
						echo "<script>
							location.href='index.php'
							</script>";
					
						unset($_SESSION['error']);
						$result->close(); //aby pozbyć się niepotrzebnych wyników zapytania

					}else{
						
						echo '<span style = "color: red">Zły login lub hasło"</span>';
						//header('location:login.php');
					}
					
				

				}

				//echo $login."i haslo ".$pass;
				$connect->close();
			}
	
			
			}catch(Exception $e){//klasa będzie zawierała info o błędzie
				echo "Błąd serwera! Prosimy spróbować później.";
				echo '</br> Info dev: '.$e;
			}

	