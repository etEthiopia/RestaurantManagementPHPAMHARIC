<?php
require('../models/tab_management.php');?>


<!doctype html>
<html>
<?php include('../inc/header.php'); ?>

<body>

<?php include ('../inc/navigation.php'); ?>

<section id="dashboard" class="main">



<div class="container pt-2 pb-5">


<h4 class="text-center pb-3">የጠረጴዛዎች አያያዝ</h4>

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

    <?php endif; ?>


<table  id="tables" class="table table-striped text-center mb-5">
<thead class="thead-dark">

<tr>

<th scope="col">የጠረጴዛ ኮድ</th>
<th scope="col">የሰዎች ቁጥር</th>
<th scope="col">የአቋም መግለጫ ቅየሳ</th>
<th scope="col">ጠረጴዛን ማስጨመር</th>
<th scope="col">የጠረጴዛን አያያዝ</th>
</tr>

</thead>
<tbody>


<?php

$tables = $conn->query("SELECT id, people FROM tables");
	if($tables->num_rows > 0):
		while($row_tab = $tables->fetch_assoc()):

?>

<tr>
<td><?= $row_tab['id']; ?></td>
<td><?= $row_tab['people']; ?></td>
<td><button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#editab<?= $row_tab['id']; ?>"><i class="fa fa-pencil" aria-hidden="true"></i></button></td>
<td><button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#addtab"><i class="fa fa-plus" aria-hidden="true"></i></button></td>
<td><button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#deltab<?= $row_tab['id']; ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></button></td>
</tr>





<!-- Modal -->
<div class="modal fade" id="editab<?= $row_tab['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    	<form id="editab" name="editab" action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">የጠረጴዛ መታወቂያ <?= $row_tab['id']; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<div class="form-group">
      		<label for="people_num">የሰዎች ቁጥር:&emsp;</label>
      	<input type="number" id="edit_people" name="edit_people" class="text-center" min="1" max="6" step="1" placeholder="<?= $row_tab['people'] ?>">
      	<input type="number" id="edit_id" name="edit_id" value="<?= $row_tab['id']; ?>" hidden>
       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-info" data-dismiss="modal">ስረዛ</button>
        <button type="submit" name="edit_tab" id="edit_tab" class="btn btn-outline-success">ማስተካከያ</button>
      </div>
  </form>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="addtab" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    	<form id="deltab" name="deltab" action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ሰንጠረዡን መጨመር ይፈልጋሉ?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<label for="people_num">የሰዎች ቁጥር:&emsp;</label>
      	<input type="number" id="people_num" name="people_num" class="text-center" min="1" max="6" step="1" required>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-info" data-dismiss="modal">ስረዛ</button>
        <button type="submit" name="add_tab" id="add_tab" class="btn btn-outline-success">አክል</button>
      </div>
  </form>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="deltab<?= $row_tab['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    	<form id="deltab" name="deltab" action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">የሠንጠረዥ መታወቂያ <?= $row_tab['id']; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<input type="number" name="tab_id" value="<?= $row_tab['id']; ?>" hidden>
        ሰንጠረዡን ለማስወገድ ይፈልጋሉ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-info" data-dismiss="modal">ስረዛ</button>
        <button type="submit" name="del_tab" id="del_tab" class="btn btn-outline-danger">አስወግድ</button>
      </div>
  </form>
    </div>
  </div>
</div>

<?php 	endwhile;

	endif; ?>

</tbody>
</table>


</div>




<?php include('../inc/footer.php') ?>
</body>
</html>
