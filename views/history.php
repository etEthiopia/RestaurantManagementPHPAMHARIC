<?php
require('../controllers/history.php');?>

<!doctype html>
<html>
<?php include('../inc/header.php'); ?>

<body>

<?php include ('../inc/navigation.php'); ?>


<section id="history" class="main">

<div class="container pt-2 pb-5">

<?php   if(isset($none)): ?>

              <div class="alert alert-danger p-2 mt-2" role="alert">
                    <?= $none;      ?>

              </div>

    <?php else: ?>
<h4 class="text-center pb-3">ከዚህ በፊት ቦታ አልያዙም</h4>
<table class="table table-striped text-center">
<thead class="thead-dark">
<tr>

<th scope="col">የመመዝገብ ቀን</th>
<th scope="col">የጠረጴዛ ቁጥር</th>
<th scope="col">የሰዎች ቁጥር</th>
</tr>
</thead>
<tbody>

<?php for($i=0; $i<sizeof($res_fname); $i++): ?>

<tr>

<td scope="row"><?= $res_date[$i]; ?></td>
<td><?= $res_table[$i]; ?></td>
<td><?= $res_people[$i]; ?></td>
</tr>

<?php endfor;  ?>

</tbody>

</table>

<?php endif; ?>
</div>

	</section>



<?php include('../inc/footer.php') ?>

</body>
</html>
