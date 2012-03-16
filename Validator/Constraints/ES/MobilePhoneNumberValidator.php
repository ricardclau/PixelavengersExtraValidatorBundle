<?php
namespace Pixelavengers\Bundle\ExtraValidatorBundle\Validator\Constraints\ES;

class MobilePhoneNumberValidator extends PhoneNumberValidator
{
    const PATTERN = '/^6[0-9]{8}$/';
}