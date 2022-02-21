<?php

namespace LisDev\Delivery\Model;

use Exception;

class Address extends AbstractModel implements ModelInterface
{
    private $name = "Address";

    public function save(array $params)
    {
        extract($params);

        try {
            // please, make sure you filled this
            /** @var $CounterpartyRef string */
            /** @var $StreetRef string */
            /** @var $BuildingNumber string */
            /** @var $Flat string */
            $this->validSave($CounterpartyRef, $StreetRef, $BuildingNumber, $Flat);
        } catch (\Exception $exception) {
            throw new Exception('ModelInterface ' . $this->name . ' method ' . self::SAVE . ' has invalid params');
        }

        parent::save($params);
    }

    public function update(string $ref, array $params)
    {
        parent::update($ref, $params);
    }

    public function delete(string $ref)
    {
        parent::delete($ref);
    }

    public function getCities()
    {}

    public function getStreet()
    {}

    public function getWarehouses()
    {}

    public function getAreas()
    {}

    public function findNearestWarehouse()
    {}

    private function validSave(string $CounterpartyRef, string $StreetRef, string $BuildingNumber, string $Flat) {}
}