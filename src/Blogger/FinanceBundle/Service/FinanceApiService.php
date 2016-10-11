<?php

namespace Blogger\FinanceBundle\Service;

class FinanceApiService {

    public $baseApi = "http://api.hackinlumberjack.com";
    public $key = "BpLnfgDsc3WD9F3qNfHK6a95jjJkwzDkh0h3fhfUVuS0jZ9uVbhV4vC6AWX40IVU";

    public function getWallets() {
        $url = $this->baseApi . '/api/finance/getwallets';
        $data = array(
            'key' => $this->key
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
        $url = $this->baseApi . '/api/finance/getincomes';
        $data = array(
            'key' => $this->key
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
        $url = $this->baseApi . '/api/finance/newincome';
        $data = array(
            'key' => $this->key,
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