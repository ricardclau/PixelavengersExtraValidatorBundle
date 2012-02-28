<?php
namespace Pixelavengers\Bundle\ExtraValidatorBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class ESSeguridadSocial extends Constraint
{
    public $message = 'This value is not a valid ES Seguridad Social number';
}