<?php
namespace Pixelavengers\Bundle\ExtraValidatorBundle\Tests\Validator\Constraints;

use Pixelavengers\Bundle\ExtraValidatorBundle\Validator\Constraints\Diners;
use Pixelavengers\Bundle\ExtraValidatorBundle\Validator\Constraints\DinersValidator;

class DinersValidatorTest extends \PHPUnit_Framework_TestCase
{
    protected $validator;

    protected function setUp()
    {
        $this->validator = new DinersValidator();
    }

    protected function tearDown()
    {
        $this->validator = null;
    }

    public function testNullIsValid()
    {
        $this->assertTrue($this->validator->isValid(null, new Diners()));
    }

    public function testEmptyStringIsValid()
    {
        $this->assertTrue($this->validator->isValid('', new Diners()));
    }

    /**
     * @expectedException Symfony\Component\Validator\Exception\UnexpectedTypeException
     */
    public function testExpectsStringCompatibleType()
    {
        $this->validator->isValid(new \stdClass(), new Diners());
    }

    /**
     * @dataProvider getValidDinerss
     */
    public function testValidDinerss($diners)
    {
        $this->assertTrue($this->validator->isValid($diners, new Diners()));
    }

    public function getValidDinerss()
    {
        return array(
            array('30569309025904'),
            array('38520000023237'),
        );
    }

    /**
     * @dataProvider getInvalidDinerss
     */
    public function testInvalidDinerss($diners)
    {
        $this->assertFalse($this->validator->isValid($diners, new Diners()));
    }

    public function getInvalidDinerss()
    {
        return array(
            array('4111111111111111'),
            array('4012888888881881'),
            array('4222222222222'),
            array('5555555555554444'),
            array('5105105105105100'),
            array('378282246310005'),
            array('371449635398431'),
            array('378734493671000'),
        );
    }
}