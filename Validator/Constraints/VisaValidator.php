<?php
namespace Pixelavengers\Bundle\ExtraValidatorBundle\Validator\Constraints;

class VisaValidator extends CreditCardValidator
{
    const PATTERN = '/^4[0-9]{12}(?:[0-9]{3})$/';
}