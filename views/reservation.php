<?php
require('../models/reservation.php');?>


<!doctype html>
<html>
<?php include('../inc/header.php'); ?>

<body>

<?php include('../inc/navigation.php'); ?>

<section id="reservation" class="main">

  <div class="container pt-2 pb-5">

      <h4 class="text-center pb-3">አዲስ ቀጠሮ ያሲዙ</h4>

          <form id="dateform" name="dateform" action="<?= $_SERVER['PHP_SELF']; ?>" method="post" class="d-block mr-auto ml-auto res-form">


  <div class="form-group">
    <label for="date">ቀን ይምረጡ</label>
    <input type="date" name="res_date" class="form-control" id="res_date" min="<?= date("Y-m-d"); ?>" required>

  </div>


  <button type="submit" id="submit_date" name="submit_date" class="submit-btn btn btn-dark d-block mr-auto ml-auto">አማራጭ</button>
</form>


<?php require('../controllers/reservation.php');?>



<div class="col-md-8 offset-md-2 mt-4 text-center">
       <?php   if(isset($err_day)): ?>

              <div class="alert alert-danger p-2 mt-2" role="alert">
                    <?= $err_day;      ?>

              </div>

    <?php endif; ?>
</div>




<?php if(isset($_POST['submit_date']) && !isset($err_day)): ?>
<div class="row mt-5">

<form id="reservation-form" name="reservation-form" action="<?= $_SERVER['PHP_SELF']; ?>" method="post" class="col-md-8 offset-md-2 res-form">
<div class="row text-center">

<?php

    $tables = $conn->query("SELECT id, people FROM tables WHERE id NOT IN (SELECT table_id FROM reservations WHERE reserved_for='$date')");

        if($tables->num_rows > 0):

          while ($row_tables = $tables->fetch_assoc()): ?>

          <div class="col-md-4 col-sm-4 col-xs-6 tables form-group mb-5">
                <label class="btn btn-outline-success"><span class="tit">ቁጥር <?= $row_tables['id']; ?></span>
                  <span class="d-block people">ሰዎች <?= $row_tables['people']; ?></span>
                  <input type="checkbox" name="table[]" autocomplete="off" value="<?= $row_tables['id']; ?>">
                  <span class="glyphicon glyphicon-ok d-block"></span>
                </label>
            </div>

    <?php      endwhile;

        else:

          $all = $conn->query("SELECT id, people FROM tables");
              if($all->num_rows > 0):
                  while($row_all = $all->fetch_assoc()): ?>

                  <div class="col-md-4 col-sm-4 col-xs-6 tables form-group mb-5">
                        <label class="btn btn-outline-success"><span class="tit">ቁጥር <?= $row_all['id']; ?></span>
                          <span class="d-block people">ሰዎች <?= $row_all['people']; ?></span>
                          <input type="checkbox" name="table[]" autocomplete="off" value="<?= $row_all['id']; ?>">
                          <span class="glyphicon glyphicon-ok d-block"></span>
                        </label>
                    </div>

        <?php          endwhile;
              endif;

        endif;


?>


<button type="submit" id="submit_table" name="submit_table" class="submit-btn btn btn-dark d-block mr-auto ml-auto">ቦታ ማስያዣ</button>


</div>
</form>


</div>

<?php endif; ?>



<div class="col-md-8 offset-md-2 mt-4 text-center">

<?php if(isset($success)): ?>

            <div class="alert alert-success p-2 mt-2" role="alert">
              <?= $success;          ?>

              </div>
            <?php endif; ?>

<?php if(isset($fail)): ?>

            <div class="alert alert-danger p-2 mt-2" role="alert">
              <?= $fail;          ?>

              </div>
            <?php endif; ?>
</div>


</div>


  </section>


<?php include('../inc/footer.php') ?>
</body>
</html>
