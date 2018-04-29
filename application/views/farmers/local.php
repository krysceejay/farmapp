<?php
if($local){?>
  <select name="lga">
    <?php foreach ($local as $key => $lga) {?>
    <option value="<?php echo $lga['local_id']; ?>"><?php echo $lga['local_name']; ?></option><?php
    } ?>

  </select>

<?php }
