<?php
namespace Pixelavengers\Bundle\ExtraValidatorBundle\Validator;

class AmexValidator extends CreditCardValidator
{
    const PATTERN = '/^3[47][0-9]{13}$/';
}