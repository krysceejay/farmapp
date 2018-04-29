<?php
if($crops){?>
    <ul>
      <?php

      foreach($crops as $key => $crop) {
      ?>

    <li onClick="selectUser('<?php echo $crop["crop_name"]; ?>');"><?php echo $crop['crop_name']; ?></li>

      <?php } ?>
      </ul>

    <?php }
