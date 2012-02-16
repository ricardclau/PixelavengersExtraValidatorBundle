<?php
namespace Pixelavengers\Bundle\ExtraValidatorBundle\Validator;

class VisaValidator extends CreditCardValidator
{
    const PATTERN = '/^4[0-9]{12}(?:[0-9]{3})$';
}