<?php require('db_connect.php');
    session_start();

if(isset($_POST['submit_table'])):

$date_sess = $_SESSION['date'];
$person = $_SESSION['id'];

foreach ($_POST['table'] as $tab1):
$tab = (int)$tab1;
$admin_res1 = $conn->query("INSERT INTO reservations (id, table_id, reserved_by, reserved_for, reserved_at) VALUES (NULL, $tab, $person, '$date_sess', now())");
endforeach;

if($admin_res1===TRUE):
        $success = "የአስተዳዳሪ መዝገብ ማጠናከሪያ በተሳካ ሁኔታ ተቀምጧል.";
      else:
        $fail = "የአቀናባሪ መዝገብ አያያዝ አልተሳካም.";
      endif;
endif;
?>