<?php require('../models/db_connect.php');
    require('../controllers/date_management.php');
    ?>


<!doctype html>
<html>
<?php include('../inc/header.php'); ?>

<body>

<?php include ('../inc/navigation.php'); ?>

<section id="dashboard" class="main">

<div class="container pt-2 pb-5">

<h4 class="text-center pb-3">የጊዜ አጠቃቀም</h4>

<nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active" id="nav-open-tab" data-toggle="tab" href="#nav-open" role="tab" aria-controls="nav-open" aria-selected="true">የስራ ሰዓት</a>
    <a class="nav-item nav-link" id="nav-close-tab" data-toggle="tab" href="#nav-close" role="tab" aria-controls="nav-close" aria-selected="false">በዓላት</a>

  </div>
</nav>
<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-open" role="tabpanel" aria-labelledby="nav-open-tab">




    <?php   if(isset($success) ): ?>

                  <div class="alert alert-success p-2 mt-2 text-center" role="alert">
                        <?= $success;      ?>

                  </div>

        <?php endif;

        	if(isset($fail)):
        ?>

        			<div class="alert alert-danger p-2 mt-2 text-center" role="alert">
                        <?= $fail;      ?>

                  </div>

        <?php endif;
    		if(isset($err_day)):
        ?>

        <div class="alert alert-danger p-2 mt-2 text-center" role="alert">
                        <?= $err_day;      ?>

                  </div>
              <?php endif; ?>



              <form name="opening" id="opening" action="<?= $_SERVER['PHP_SELF']; ?>" method="post" class="d-block mr-auto ml-auto reg-form mt-5 mb-5">


                <div class="form-group">
                  <label for="day_upd">ቀን</label>
                <select id="day_upd" name="day_upd" class="form-control" required>
                  <option value="" disabled selected>አንድ ቀን ይምረጡ</option>
    <?php 
      require('../models/date_management.php');?>
                </select>
                </div>

              <div class="form-group">
                <label for="opening_upd">ክፍት ከ:</label>
              <input type="time" class="form-control" id="opening_upd" name="opening_upd" required>
              </div>

              <div class="form-group">
                <label for="closing_upd">ክፍት እስከ:</label>
              <input type="time" class="form-control" id="closing_upd" name="closing_upd" required>
              </div>

              <button type="submit" name="date_upd" id="date_upd" class="submit-btn btn btn-dark d-block mr-auto ml-auto">ማስገባት</button>
              </form>
  </div>

  <div class="tab-pane fade" id="nav-close" role="tabpanel" aria-labelledby="nav-close-tab">


              <form name="closing" id="closing" action="<?= $_SERVER['PHP_SELF']; ?>" method="post" class="d-block mr-auto ml-auto reg-form mt-5 mb-5">


                <div class="form-group">
                  <label for="day_close">ቀን</label>
                <select id="day_close" name="day_close_id" class="form-control" required>
                  <option value="" selected disabled>አንድ ቀን ይምረጡ</option>
    <?php
        $days = $conn->query("SELECT id, day_name FROM days");
          if($days->num_rows > 0):
            while ($row_days = $days->fetch_assoc()):
    ?>

                    <option value="<?= $row_days['id'] ?>"><?= $row_days['day_name'] ?></option>

    <?php
            endwhile;
          endif;
    ?>
                </select>
                </div>

              <button type="submit" name="day_close" id="day_close" class="submit-btn btn btn-dark d-block mr-auto ml-auto">ማስገባት</button>
              <?php if (isset($fail)): ?>
              <div class="alert alert-danger p-2 mt-2" role="alert"><?= $fail; ?></div>
              <?php endif; ?>
              </form>
            
  </div>
</div>

</div>
<?php include('../inc/footer.php') ?>
</body>
</html>
