<?php
namespace Pixelavengers\Bundle\ExtraValidatorBundle\Validator;

use Symfony\Component\Validator\Constraint;

abstract class CreditCard extends Constraint
{
    public $invalidChecksumMessage = 'This value is not a valid Credit Card';
}