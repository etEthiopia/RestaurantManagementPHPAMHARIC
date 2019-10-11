<?php require('../models/db_connect.php');
    session_start();

$user = $_SESSION['id'];

$old = $conn->query("SELECT fname, lname, table_id, reserved_for, people FROM users INNER JOIN reservations ON users.id=reserved_by INNER JOIN tables ON tables.id=table_id WHERE reserved_by=$user AND reserved_for<now()");

	if($old->num_rows > 0):

	while($row_old = $old->fetch_assoc()):
		$res_fname[] = $row_old['fname'];
		$res_lname[] = $row_old['lname'];
		$res_table[] = $row_old['table_id'];
		$res_date[] = $row_old['reserved_for'];
		$res_people[] = $row_old['people'];
		$reservations = TRUE;
	endwhile;

else:

	$none = "ከዚህ በፊት ቦታ አልያዙም.";

endif;

?>