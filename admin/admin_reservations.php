<?php require('../models/admin_reservations.php'); ?>

<!doctype html>
<html>
<?php include('../inc/header.php'); ?>

<body>

<?php include('../inc/navigation.php'); ?>

<section id="reservation" class="main">

  <div class="container pt-2 pb-5">

<h4 class="text-center pb-3">የአስተዳደር መጠባበቂያ</h4>

          <form id="dateform" name="dateform" action="<?= $_SERVER['PHP_SELF']; ?>" method="post" class="d-block mr-auto ml-auto res-form">


  <div class="form-group">
    <label for="date">ቀን</label>
    <input type="date" name="res_date" class="form-control" id="res_date" min="<?= date("Y-m-d"); ?>" required>

  </div>


  <button type="submit" id="submit_date" name="submit_date" class="submit-btn btn btn-dark d-block mr-auto ml-auto">አስገባ</button>
</form>


<?php require("../controllers/admin_reservations.php")?>



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
require("../controllers/table_controller.php");?>

<div class="col-md-10 offset-md-1">
 

  <button type="submit" id="submit_table" name="submit_table" class="submit-btn btn btn-dark d-block mr-auto ml-auto">መጠባበቂያ</button>

</div>



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
