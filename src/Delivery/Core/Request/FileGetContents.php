<?php


namespace LisDev\Delivery\Core\Request;

use LisDev\Delivery\Core\RequestInterface;

class FileGetContents implements RequestInterface
{
    public function execute(array $data, string $url, int $timeout = 0)
    {
        $httpOptions = [
            'method' => 'POST',
            'header' => "Content-type: application/x-www-form-urlencoded;\r\n",
            'content' => $data
        ];

        if ($timeout > 0) {
            $httpOptions['timeout'] = $timeout;
        }

        $streamContext = stream_context_create(['http' => $httpOptions]);
        return file_get_contents($url, false, $streamContext);
    }
}