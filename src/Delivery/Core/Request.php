<?php

namespace LisDev\Delivery\Core;

use LisDev\Delivery\Core\Request\Curl;
use LisDev\Delivery\Core\Request\FileGetContents;

class Request
{
    const API_URI = 'https://api.novaposhta.ua/v2.0/json/';
    const CURL = 'curl';
    const FILE_GET_CONTENTS = 'file_get_contents';

    /**
     * @var string
     */
    private $key;

    /**
     * @var array
     */
    private $params;

    /**
     * @var string
     */

    private $connectionType;
    /**
     * @var int
     */
    private $timeout;

    public function __construct(string $connectionType = self::CURL, string $key = null, int $timeout = 0)
    {
        #todo make getting key from config... or change tests
        $this->key = $key;
        $this->connectionType = $connectionType;
        $this->timeout = $timeout;
    }

    public function setParams(array $params)
    {
        $this->params = $params;
    }

    public function execute()
    {
        if ($this->connectionType = self::CURL) {
            $request = new Curl();
        }

        if ($this->connectionType = self::FILE_GET_CONTENTS) {
            $request = new FileGetContents();
        }

        $this->params['apiKey'] = $this->key;

        return $request->execute($this->params, self::API_URI, $this->timeout);
    }

}