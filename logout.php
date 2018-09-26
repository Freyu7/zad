<?php
			session_start();
            session_unset();
            unset($_SESSION['error']);
            header("location:logowanie.php");
            
            $_SESSION['cookie'] = false;									
				
?>