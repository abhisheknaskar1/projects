<?php
namespace App\Form;
use App\Utility\StringMask;
use ArrayObject;
use Cake\Form\Schema;
use Cake\I18n\Number;
use DateTime;

trait MarshallerTrait
{
    public function marshal(ArrayObject $data)
    {
        /** @var Schema $schema */
        $schema = $this->schema();
        foreach ( $data as $property => $datum ) {
            $type = $schema->fieldType($property);
            if ( $type === "date" ) {
                if ( $datum ) {
                    $data[$property] =  (new DateTime())->createFromFormat("l d F Y", $datum)->format("Y-m-d");
                }
                continue;
            }
            if ( $type === "money" ) {
                if ( $datum ) {
                    $data[$property]["amount"] =  Number::parseFloat($data[$property]["amount"]);
                }
                continue;
            }
            $mask = $this->_mask[$property] ?? null;
            if ( $mask ) {
                if ( $type === "contact" ) {
                    if ( $datum["number"] ) {
                        $data[$property]["number"] =  StringMask::unmask($datum["number"], $mask);
                    }
                    continue;
                }
                $data[$property] =  StringMask::unmask($datum, $mask);
            }
        }
    }
}
