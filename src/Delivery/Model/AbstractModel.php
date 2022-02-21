<?php


namespace LisDev\Delivery\Model;

use LisDev\Delivery\Core\Request;

abstract class AbstractModel implements ModelInterface
{
    const SAVE = 'save';
    const UPDATE = 'update';
    const DELETE = 'delete';

    protected $name = "";
    protected $conn;
    protected $ref;
    protected $params;

    public function __construct(Request $conn = null)
    {
        if (!$conn) {
            $this->conn = new Request();
        } else {
            $this->conn = $conn;
        }
    }

    public function save(array $params)
    {
        $this->params = $params;
        return $this->run(self::SAVE);
    }

    public function update(string $ref, array $params)
    {
        $this->params = $params;
        $this->ref = $ref;
        return $this->run(self::UPDATE);
    }

    public function delete(string $ref)
    {
        $this->ref = $ref;
        return $this->run(self::DELETE);
    }

    public function setResponseFormat(string $format)
    {

    }

    protected function mergeModelParams($method, $additionalParams = [])
    {
        $params = [
            'modelName' => $this->name,
            'calledMethod' => $method,
            'methodProperties' => array_merge($this->params, $additionalParams),
        ];

        if($this->ref) {
            $params['methodProperties']['Ref'] = $this->ref;
        }

        return $params;
    }

    protected function run($method, $additionalParams = [])
    {
        $this->conn->setParams($this->mergeModelParams($method, $additionalParams));
        return $this->conn->execute();
    }
}