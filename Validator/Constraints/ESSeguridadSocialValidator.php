<?php
namespace Pixelavengers\Bundle\ExtraValidatorBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;

class ESSeguridadSocialValidator extends ConstraintValidator
{
    /**
     * This number is 11 digit length for companies and 12 digit length for employees
     */
    const PATTERN = '/^[0-9]{11,12}$/';

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

        if (!$this->validateESSeguridadSocialNumber($value)) {
            $this->setMessage($constraint->message);

            return false;
        }

        return true;
    }

    /**
     * This number is 12 digit length with the following format aabbbbbbbbcc
     * where aa means the state
     *       bbbbbbbb is the number
     *       cc is the checksum calculated in quite a strange way
     *
     * @param string $value
     * @return bool
     */
    private function validateESSeguridadSocialNumber($value)
    {
        $stateId = (int) substr($value, 0, 2);
        $number = (int) substr($value, 2, -2);
        $checksum = (int) substr($value, -2);

        if ($number < 10000000) {
            $tmp = $stateId * 10000000 + $number;
        } else {
            $tmp = (int) ((string) $stateId . (string) $number);
        }

        return ($checksum === ($tmp % 97));
    }
}