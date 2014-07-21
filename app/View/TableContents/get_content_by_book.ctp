<option value="0"><?php echo "-- No tiene padre --" ?></option>
 <?php foreach ($contents as $key => $value) { ?>    
    <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
<?php } ?>
