<?php


namespace LisDev\Delivery\Model;


use Exception;

class ContactPerson extends AbstractModel implements ModelInterface
{
    private $name = "ContactPerson";

    public function save(array $params)
    {
        extract($params);

        try {
            // please, make sure you filled this
            /** @var $CounterpartyRef string */
            /** @var $FirstName string */
            /** @var $LastName string */
            /** @var $MiddleName string */
            /** @var $Phone string */
            $this->validSave($CounterpartyRef, $FirstName, $LastName, $MiddleName, $Phone);
        } catch (\Exception $exception) {
            throw new Exception('ModelInterface ' . $this->name . ' method ' . self::SAVE . ' has invalid params');
        }

        parent::save($params);
    }

    public function update(string $ref, array $params)
    {
        extract($params);

        try {
            // please, make sure you filled this
            // for some reason, each field is needed
            // todo: find how ContactPerson was made
            /** @var $CounterpartyRef string */
            /** @var $FirstName string */
            /** @var $LastName string */
            /** @var $MiddleName string */
            /** @var $Phone string */
            $this->validSave($CounterpartyRef, $FirstName, $LastName, $MiddleName, $Phone);
        } catch (\Exception $exception) {
            throw new Exception('ModelInterface ' . $this->name . ' method ' . self::SAVE . ' has invalid params');
        }

        parent::update($ref, $params);
    }

    public function delete(string $ref)
    {
        parent::delete($ref);
    }

    public function validSave(string $CounterpartyRef, string $FirstName, string $LastName, string $MiddleName, string $Phone) {}
}