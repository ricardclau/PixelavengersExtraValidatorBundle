<?php
namespace Pixelavengers\Bundle\AdminGeneratorBundle\Validator;

class DiscoverValidator extends CreditCardValidator
{
    const PATTERN = '/^6(?:011|5[0-9]{2})[0-9]{12}$/';
}