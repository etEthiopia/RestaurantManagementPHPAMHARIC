<?php require('../controllers/register.php');
?>
<!doctype html>
<html>
<?php include('../inc/header.php'); ?>

<body>

<?php include ('../inc/navigation.php'); ?>

<section id="register" class="main">

	<div class="container pt-5 pb-5">

				<form name="regform" id="regform" action="<?= $_SERVER['PHP_SELF']; ?>" method="post" class="d-block mr-auto ml-auto reg-form">
  <div class="form-group">

    <input type="text" class="form-control" id="fname" name="fname" placeholder="ስም" required>

  </div>

	 <div class="form-group">
    <input type="text" class="form-control" id="lname" name="lname" placeholder="የአባት ስም" required>

  </div>

				<div class="form-group">
    <input type="email" class="form-control" id="email" name="email" placeholder="ኢሜል" required>

  </div>

  <div class="form-group">
    <input type="password" class="form-control" id="password" name="password" placeholder="የይለፍ ቃል" required>
	  <?php if(isset($error_conf)): ?>
	   <div class="alert alert-danger p-2 mt-2" role="alert"><?= $error_conf; ?></div>
	  <?php endif; ?>
  </div>

			<div class="form-group">
    <input type="password" class="form-control" id="confirm" name="confirm" placeholder="የይለፍ ቃልዎን ያረጋግጡ" required>
  </div>

  <div class="form-group">
    <input type="tel" class="form-control" id="mobile" name="mobile" placeholder="ሞባይል">
  </div>

<div class="form-group">

	<select class="form-control" name="admin" required onchange="yesnoCheck()">
		<option value="" selected disabled>የተጠቃሚ ምድብ</option>
		<option value="user">ተጠቃሚ</option>
		<option id="adminchk" value="admin">አስተዳደር</option>
	</select>
	  </div>

	<div class="form-group">
    <input type="password" class="form-control" id="adminpass" name="adminpass" placeholder="የአስተዳዳሪ ኮድ (on ReadMe file)" style="display: none" required>
		<?php if(isset($error_adminpass)): ?>
		<div class="alert alert-danger p-2 mt-2" role="alert"><?= $error_adminpass; ?></div>
		<?php endif; ?>
  </div>

  <button type="submit" name="registration" id="registration" class="submit-btn btn btn-dark d-block mr-auto ml-auto">አስገባ</button>



  <?php if (isset($fail)): ?>
  <div class="alert alert-danger p-2 mt-2" role="alert"><?= $fail; ?></div>
  <?php endif; ?>


</form>




</div>

	</section>


<?php include('../inc/footer.php') ?>
</body>
</html>
