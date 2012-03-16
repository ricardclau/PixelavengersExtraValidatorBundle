<?php
namespace Pixelavengers\Bundle\ExtraValidatorBundle\Validator\Constraints\ES;

class FixedPhoneNumberValidator extends PhoneNumberValidator
{
    const PATTERN = '/^9[0-9]{8}$/';
}