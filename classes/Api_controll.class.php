<?php

// require_once "Api_data.class.php";

class Api_controll extends Api_Data{


    public function getApi_data(){

       $products = $this ->setApi_data();
       return $products;

    }

}