<?php

namespace LisDev\Delivery\Model;

interface ModelInterface
{
    public function save(array $params);
    public function update(string $ref, array $params);
    public function delete(string $ref);
}