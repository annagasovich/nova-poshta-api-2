<?php


namespace LisDev\Delivery\Core;


interface RequestInterface
{
    public function execute(array $data, string $url, int $timeout = 0);
}