<?php
require('logInForPatient.php');
session_destroy();
header('Location:logInForPatient.php');

?>