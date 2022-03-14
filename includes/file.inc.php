<?php

require_once  "./classes/Api_data.class.php";
 require_once  "./classes/Api_controll.class.php";


$products  = new Api_controll();
$items = $products ->getApi_data();
