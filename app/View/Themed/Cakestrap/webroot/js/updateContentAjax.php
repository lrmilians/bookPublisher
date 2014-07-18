<?php

$i = 0;

echo '<pre>';
print_r($_POST);
echo '<pre>';


foreach ($_POST['item'] as $value) {
    // Execute statement:
    // UPDATE [Table] SET [Position] = $i WHERE [EntityId] = $value
    $i++;
}
exit; 
?>
