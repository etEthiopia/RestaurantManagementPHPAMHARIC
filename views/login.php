 <?php require('../models/db_connect.php');

    require('../controllers/login.php');?>

<!doctype html>
<html>
<?php include('../inc/header.php'); ?>

<body>

<?php include ('../inc/navigation.php'); ?>

<section id="login" class="main">

	<div class="container pt-5 pb-5">

					<form name="logform" id="logform" action="<?= $_SERVER['PHP_SELF']; ?>" method="post" class="d-block mr-auto ml-auto log-form">

						<?php if(isset($_SESSION['message'])): ?>
						<div class="alert alert-success p-2 mt-2" role="alert">
							<?= $_SESSION['message'];
							session_unset();
      						session_destroy();
						?></div>
						<?php endif; ?>


						<?php if(isset($fail)): ?>
						<div class="alert alert-danger p-2 mt-2" role="alert"><?= $fail; ?></div>
						<?php endif; ?>

				<div class="form-group">

    <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>

  </div>

  <div class="form-group">

    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
  </div>


  <button type="submit" id="login" name="login" class="submit-btn btn btn-dark d-block mr-auto ml-auto">ማስገባት</button>


</form>


</div>

	</section>

<?php include('../inc/footer.php') ?>
</body>
</html>
