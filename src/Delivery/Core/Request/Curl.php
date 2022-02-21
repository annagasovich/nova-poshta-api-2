<?php

namespace LisDev\Delivery\Core\Request;

use LisDev\Delivery\Core\RequestInterface;

class Curl implements RequestInterface
{
    public function execute(array $data, string $url, int $timeout = 0)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

        if ($timeout > 0) {
            curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        }

        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }
}