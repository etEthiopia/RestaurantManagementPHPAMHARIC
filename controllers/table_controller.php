<?php

    $tables = $conn->query("SELECT id, people FROM tables WHERE id NOT IN (SELECT table_id FROM reservations WHERE reserved_for='$date')");

        if($tables->num_rows > 0):

          while ($row_tables = $tables->fetch_assoc()): ?>

          <div class="col-md-4 col-sm-4 col-xs-6 tables form-group mb-5">
                <label class="btn btn-outline-success"><span class="tit">ቁጥር <?= $row_tables['id']; ?></span>
                  <span class="d-block people">አቅም <?= $row_tables['people']; ?></span>
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
                          <span class="d-block people">አቅም <?= $row_all['people']; ?></span>
                          <input type="checkbox" name="table[]" autocomplete="off" value="<?= $row_all['id']; ?>">
                          <span class="glyphicon glyphicon-ok d-block"></span>
                        </label>

                    </div>

        <?php          endwhile;
              endif;

        endif;


?>