<?php
ob_start();



$body=ob_get_contents(); 
ob_end_clean();

require "./admin_panel.php";