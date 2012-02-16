<?php
namespace Pixelavengers\Bundle\ExtraValidatorBundle\Validator;

class DinersValidator extends CreditCardValidator
{
    const PATTERN = '/^3(?:0[0-5]|[68][0-9])[0-9]{11}$/';
}