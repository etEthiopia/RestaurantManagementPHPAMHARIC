<?php require('db_connect.php');
    session_start();

if(isset($_POST['submit_table'])):

$date_sess = $_SESSION['date'];
$person = $_SESSION['id'];

foreach ($_POST['table'] as $tab1):
$tab = (int)$tab1;
$newres = $conn->query("INSERT INTO reservations (id, table_id, reserved_by, reserved_for, reserved_at) VALUES (NULL, $tab, $person, '$date_sess', now())");
endforeach;

if($newres===TRUE):
        $success = "ቦታ ማስያዝዎ ተሳክቷል። እናመሰግናለን።";
      else:
        $fail = "ቦታ ማስያዝዎ አልተሳካም። እባክዎን ከንደገና ይሞክሩ።";
      endif;
endif;
?>