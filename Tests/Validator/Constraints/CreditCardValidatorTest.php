<?php
namespace Pixelavengers\Bundle\ExtraValidatorBundle\Tests\Validator\Constraints;

use Pixelavengers\Bundle\ExtraValidatorBundle\Validator\Constraints\CreditCard;
use Pixelavengers\Bundle\ExtraValidatorBundle\Validator\Constraints\CreditCardValidator;

class CreditCardValidatorTest extends \PHPUnit_Framework_TestCase
{
    protected $validator;

    protected function setUp()
    {
        $this->validator = new CreditCardValidator();
    }

    protected function tearDown()
    {
        $this->validator = null;
    }

    public function testNullIsValid()
    {
        $this->assertTrue($this->validator->isValid(null, new CreditCard()));
    }

    public function testEmptyStringIsValid()
    {
        $this->assertTrue($this->validator->isValid('', new CreditCard()));
    }

    /**
     * @expectedException Symfony\Component\Validator\Exception\UnexpectedTypeException
     */
    public function testExpectsStringCompatibleType()
    {
        $this->validator->isValid(new \stdClass(), new CreditCard());
    }

    /**
     * @dataProvider getValidCreditCards
     */
    public function testValidCreditCards($creditCard)
    {
        $this->assertTrue($this->validator->isValid($creditCard, new CreditCard()));
    }

    public function getValidCreditCards()
    {
        return array(
            array('378282246310005'),
            array('371449635398431'),
            array('378734493671000'),
            array('4548812049400004'),
            array('4111111111111111'),
            array('4012888888881881'),
            array('4222222222222'),
            array('5555555555554444'),
            array('5105105105105100'),
            array('30569309025904'),
            array('38520000023237'),
            array('6011111111111117'),
            array('6011000990139424'),
            array('3530111333300000'),
            array('3566002020360505'),
        );
    }

    /**
     * @dataProvider getInvalidCreditCards
     */
    public function testInvalidCreditCards($creditcard)
    {
        $this->assertFalse($this->validator->isValid($creditcard, new CreditCard()));
    }

    public function getInvalidCreditCards()
    {
        return array(
            array('511a1111111111118'),
            array('abcdef'),
            array('422222222222211'),
            array('55555555555544441'),
            array('510510510510100'),
        );
    }
}