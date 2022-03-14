<?php

class Api_Data
{


   protected function setApi_data()
    {

        $ch = curl_init();
        $options = [
            CURLOPT_URL => 'https://fakestoreapi.com/products',
            CURLOPT_RETURNTRANSFER => true
        ];
        curl_setopt_array($ch, $options);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Errors: ' . curl_error($ch);
        } else {
            $data = json_decode($result, true);
        }

        return $data;
    }
}
