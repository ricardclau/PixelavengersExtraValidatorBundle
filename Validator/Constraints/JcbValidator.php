<?php
namespace Pixelavengers\Bundle\ExtraValidatorBundle\Validator\Constraints;

class JcbValidator extends CreditCardValidator
{
    const PATTERN = '/^(?:2131|1800|35[0-9]{3})[0-9]{11}$/';
}