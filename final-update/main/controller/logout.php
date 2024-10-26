<?php

include '../include/global.php';

if(!session()) redirect('./');

session_destroy();

redirect('./');

?>