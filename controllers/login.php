<?php
session_start();

		if (isset($_REQUEST['login'])):
      session_unset();
      session_destroy();

			$email = stripslashes($_REQUEST['email']); // removes backslashes
			$email = mysqli_real_escape_string($conn,$email); //escapes special characters in a string
			$password = md5($_REQUEST['password']);


			$sql = $conn->query("SELECT id, fname, lname, email, admin FROM users WHERE email='$email' AND password='$password'");
			if ($sql->num_rows > 0):

				while($row_login = $sql->fetch_assoc()):

					session_start();
					$_SESSION['fname'] = $row_login['fname'];
			        $_SESSION['lname'] = $row_login['lname'];
			        $_SESSION['email'] = $row_login['email'];
			        $_SESSION['admin'] = $row_login['admin'];
      				$_SESSION['id'] = $row_login['id'];

              if ($row_login['admin']==0):
			        header("location: reservation.php");
              elseif ($row_login['admin']==1):
              header("location: ../admin/dashboard.php");
              endif;

				endwhile;



			else:
				$fail = "ኢሜይል ለመላክ እና / ወይም የይለፍ ቃልዎ ትክክል አይደለም. እንደገና ይሞክሩ.";

			endif;


		endif;
?>