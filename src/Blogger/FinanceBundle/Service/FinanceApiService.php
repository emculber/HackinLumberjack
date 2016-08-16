<?php

namespace Blogger\FinanceBundle\Service;

class FinanceApiService {

    public function getWallets() {
        $url = 'http://localhost:8080/api/finance/getwallets';
        $data = array(
            'key' => '66IliKuYo5wZNlyXdlsLCWoUBliSWKu8Rms7wbTfmk3yz5Pn3sThrdrx914UivQF'
        );
        $options = array(
            'http' => array(
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query($data),
            )
        );

        $context  = stream_context_create($options);
        $json = file_get_contents($url, false, $context);
        return json_decode($json, true);
    }

    public function getIncomes() {
        $url = 'http://localhost:8080/api/finance/getincomes';
        $data = array(
            'key' => '66IliKuYo5wZNlyXdlsLCWoUBliSWKu8Rms7wbTfmk3yz5Pn3sThrdrx914UivQF'
        );
        $options = array(
            'http' => array(
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query($data),
            )
        );

        $context  = stream_context_create($options);
        $json = file_get_contents($url, false, $context);
        return json_decode($json, true);
    }

    public function newIncome($note, $amount, $date) {
        $url = 'http://localhost:8080/api/finance/newincome';
        $data = array(
            'key' => '66IliKuYo5wZNlyXdlsLCWoUBliSWKu8Rms7wbTfmk3yz5Pn3sThrdrx914UivQF',
            'date' => $date,
            'amount' => $amount,
            'wallet_id' => 1,
            'note' => $note
        );
        $options = array(
            'http' => array(
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query($data),
            )
        );

        $context  = stream_context_create($options);
        $json = file_get_contents($url, false, $context);
        return json_decode($json, true);
    }
}