<?php
session_start();
require_once "../includes/file.inc.php";


function empty_cart()
{
    if (isset($_POST['remove'])) {


        //print_r($_GET["id"])."<br>";
        if ($_GET['action'] == 'remove') {

            foreach ($_SESSION['cart'] as $key => $value) {

                //  print_r($_SESSION['cart']);
                // echo $value['product_id'];
                // echo $_GET['id']."<br>";
                //         echo $value['product_id'];
                if ($value['product_id'] == $_GET['id']) {
                    unset($_SESSION['cart'][$key]);
                }
            }
        }
    }
    return true;
}
