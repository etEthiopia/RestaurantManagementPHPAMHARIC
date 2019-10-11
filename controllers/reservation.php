<?php
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

      $err_day = "ምግብ ቤቱ በመረጡት ቀን ተዘግቷል.";

    endif;

endif;

  ?>