<?php
ob_start();
?>

<?php
$body = ob_get_contents();
ob_end_clean();

require('./user_panel.php');
