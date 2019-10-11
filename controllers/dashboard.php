<?php require('../models/db_connect.php');

    session_start();

if(isset($_POST['all_reservations'])):

$resStatus = $conn->query("SELECT users.id AS userid, fname, lname, admin, reservations.id AS resid, table_id, reserved_for, people FROM users INNER JOIN reservations ON users.id=reserved_by INNER JOIN tables ON tables.id=table_id WHERE reserved_by=users.id ORDER BY reserved_for");



  if($resStatus->num_rows > 0):

      while($row_status = $resStatus->fetch_assoc()):
        $res_id[] = $row_status['resid'];
        $res_fname[] = $row_status['fname'];
        $res_lname[] = $row_status['lname'];
        $res_admin[] = $row_status['admin'];
        $res_table[] = $row_status['table_id'];
        $res_date[] = $row_status['reserved_for'];
        $res_people[] = $row_status['people'];
      //  $reservations = TRUE;
      endwhile;

  else:

  $none = "ምንም አይነት ምዝገባዎች የሉም.";

  endif;

endif;




if(isset($_POST['submit_date'])):

  $date = $_POST['res_date'];

$nameOfDay = date('D', strtotime($date));

  switch ($nameOfDay) {
    case 'Mon':
      $d = 1;
      break;
    case 'Tue':
      $d = 2;
      break;
    case 'Wed':
      $d = 3;
      break;
    case 'Thu':
      $d = 4;
      break;
    case 'Fri':
      $d = 5;
      break;
    case 'Sat':
      $d = 6;
      break;
    default:
      $d = 7;
      break;
  }

  $_SESSION['date'] = $date;


  $day_chk = $conn->query("SELECT days.id FROM days INNER JOIN hours ON days.id=hours.day_id WHERE day_id=$d");

    if ($day_chk->num_rows < 1):

      $err_day = "ምግብ ቤቱን የመረጡት ቀን ተዘግቷል.";

    else:
  $resStatus = $conn->query("SELECT users.id AS userid, fname, lname, admin, reservations.id AS resid, table_id, reserved_for, people FROM users INNER JOIN reservations ON users.id=reserved_by INNER JOIN tables ON tables.id=table_id WHERE reserved_by=users.id AND reserved_for='$date' ORDER BY reserved_for");

  if($resStatus->num_rows > 0):

      while($row_status = $resStatus->fetch_assoc()):
        $res_id[] = $row_status['resid'];
        $res_fname[] = $row_status['fname'];
        $res_lname[] = $row_status['lname'];
        $res_admin[] = $row_status['admin'];
        $res_table[] = $row_status['table_id'];
        $res_date[] = $row_status['reserved_for'];
        $res_people[] = $row_status['people'];
      //  $reservations = TRUE;
      endwhile;

  else:

  $none = "ምንም አይነት ምዝገባዎች የሉም.";

  endif;
    endif;
endif;
    ?>