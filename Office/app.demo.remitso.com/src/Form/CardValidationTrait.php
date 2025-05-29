<?php
namespace App\Form;
use App\Utility\ExpiryDate;
use Cake\Collection\CollectionInterface;
use Cake\Utility\Text;
use Cake\Validation\Validator;
use Respect\Validation\Validator as v;

/**
 * Trait CardValidationTrait
 * @package App\Form
 */
trait CardValidationTrait
{
    /**
     * @param CollectionInterface $schemeCollection
     */
    public function validationCard(CollectionInterface $schemeCollection)
    {
        /** @var Validator $validator */
        $validator = $this->getValidator();

        $validator
            ->scalar("card_number")
            ->requirePresence("card_number", function($context){
                return  ($context["data"]["saved_card_id"] ?? "new") === "new";
            })
            ->notEmptyString("card_number", __("Card number is required"), function($context){
                return  ($context["data"]["saved_card_id"] ?? "new") === "new";
            })
            ->add("card_number", "_invalid", [
                "rule" => function($data, $context) {
                    if ( ($context["data"]["saved_card_id"] ?? "new") === "new" ) {
                        return v::creditCard()->validate($data);
                    }
                    return true;
                },
                'message' => __("The card number is incorrect"),
            ]);

        $validator
            ->scalar("card_scheme")
            ->requirePresence("card_scheme", function($context){
                return  ($context["data"]["saved_card_id"] ?? "new") === "new";
            })
            ->notEmptyString("card_scheme", __("Card type is required"), function($context){
                return  ($context["data"]["saved_card_id"] ?? "new") === "new";
            })
            ->add("card_scheme", "_invalid", [
                "rule" => function( $data, $context ) use($schemeCollection) {
                    if ( ($context["data"]["saved_card_id"] ?? "new") === "new" ) {
                        return $schemeCollection->firstMatch([
                            "id" => $data
                        ]) ? true : __("Currently we only support {card_schemes}", [
                            "card_schemes" => Text::toList($schemeCollection->extract("title")->toArray())
                        ]);
                    }
                    return true;
                }
            ]);

        $validator
            ->scalar("expiry")
            ->requirePresence("expiry", function($context){
                return  ($context["data"]["saved_card_id"] ?? "new") === "new";
            })
            ->notEmptyString("expiry", __("Card expiry date is required"), function($context){
                return  ($context["data"]["saved_card_id"] ?? "new") === "new";
            })
            ->add("expiry", "_invalid", [
                "rule" => function( $data ) {
                    if ( ($context["data"]["saved_card_id"] ?? "new") === "new" ) {
                        $expiry = ExpiryDate::getExpiry($data);
                        if ( is_string($expiry) ) {
                            return $expiry;
                        }
                        if ( $expiry->isPast() ) {
                            return __("Your card has been expired");
                        }
                    }
                    return true;
                },
            ]);

        $validator
            ->integer("cvc")
            ->minLength("cvc", 3, "", function($context){
                return  ($context["data"]["saved_card_id"] ?? "new") === "new";
            })
            ->maxLength("cvc", 3, "", function($context){
                return  ($context["data"]["saved_card_id"] ?? "new") === "new";
            })
            ->requirePresence("cvc", function($context){
                return  ($context["data"]["saved_card_id"] ?? "new") === "new";
            })
            ->notEmptyString("cvc", __("CVC is required"), function($context){
                return  ($context["data"]["saved_card_id"] ?? "new") === "new";
            });

        $validator
            ->scalar("name_on_card")
            ->requirePresence("name_on_card", function($context){
                return  ($context["data"]["saved_card_id"] ?? "new") === "new";
            })
            ->notEmptyString("name_on_card", __("Name on card is required"), function($context){
                return  ($context["data"]["saved_card_id"] ?? "new") === "new";
            });
    }
}
