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