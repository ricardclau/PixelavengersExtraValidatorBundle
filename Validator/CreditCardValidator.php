<?php
namespace Pixelavengers\Bundle\ExtraValidatorBundle\Validator;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;

abstract class CreditCardValidator extends ConstraintValidator
{
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

        if (!$this->validateChecksum($value)) {
            $this->setMessage($constraint->invalidChecksumMessage);

            return false;
        }

        if (!preg_match(static::PATTERN, $value, $matches)) {
            $this->setMessage($constraint->message, array('{{ value }}' => $value));

            return false;
        }

        return true;
    }

    /**
     * This is based in Luhn Algorithm
     * @see http://en.wikipedia.org/wiki/Luhn_algorithm
     *
     * @param string $value
     * @return bool
     */
    protected function validateChecksum($value)
    {
        $aux = '';
        foreach (str_split(strrev($value)) as $pos => $digit) {
            // Multiply * 2 all even digits
            $aux .= ($pos % 2 != 0) ? $digit * 2 : $digit;
        }
        // Sum all digits in string
        $checksum = array_sum(str_split($aux));

        // Card is OK if the sum is an even multiple of 10 and not 0
        return ($checksum != 0 && $checksum % 10 == 0);
    }
}