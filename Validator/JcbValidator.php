<?php
namespace Pixelavengers\Bundle\AdminGeneratorBundle\Validator;

class JcbValidator extends CreditCardValidator
{
    const PATTERN = '/^(?:2131|1800|35[0-9]{3})[0-9]{11}$/';
}