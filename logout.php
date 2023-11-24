<?php

require_once 'functions.php';
unset($_SESSION['user']);
header('refresh:0;index.php'); die;
