<?php
namespace Pixelavengers\Bundle\ExtraValidatorBundle\Validator\Constraints\ES;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;

class PhoneNumberValidator extends ConstraintValidator
{
    /**
     * @see http://regexlib.com/REDetails.aspx?regexp_id=1835
     * Generic Credit Card Validator
     */
    const PATTERN = '/^[6|9][0-9]{8}$/';

    /**
     * {@inheritDoc}
     */
    public function isValid($value, Constraint $constraint)
    {
        if (null === $value || '' === $value) {
            return true;
        }

        if (!is_scalar($value) && !(is_object($value) && method_exists($value, '__toString'))) {
            throw new UnexpectedTypeException($value, 'string');
        }

        $value = (string) $value;

        if (!preg_match(static::PATTERN, $value, $matches)) {
            $this->setMessage($constraint->message, array('{{ value }}' => $value));

            return false;
        }

        return true;
    }
}