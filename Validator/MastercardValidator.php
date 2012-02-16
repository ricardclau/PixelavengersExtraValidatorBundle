<?php
namespace Pixelavengers\Bundle\AdminGeneratorBundle\Validator;

class MastercardValidator extends CreditCardValidator
{
    const PATTERN = '/^5[1-5][0-9]{14}$/';
}