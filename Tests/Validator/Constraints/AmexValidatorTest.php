<?php
namespace Pixelavengers\Bundle\ExtraValidatorBundle\Tests\Validator\Constraints;

use Pixelavengers\Bundle\ExtraValidatorBundle\Validator\Constraints\Amex;
use Pixelavengers\Bundle\ExtraValidatorBundle\Validator\Constraints\AmexValidator;

class AmexValidatorTest extends \PHPUnit_Framework_TestCase
{
    protected $validator;

    protected function setUp()
    {
        $this->validator = new AmexValidator();
    }

    protected function tearDown()
    {
        $this->validator = null;
    }

    public function testNullIsValid()
    {
        $this->assertTrue($this->validator->isValid(null, new Amex()));
    }

    public function testEmptyStringIsValid()
    {
        $this->assertTrue($this->validator->isValid('', new Amex()));
    }

    /**
     * @expectedException Symfony\Component\Validator\Exception\UnexpectedTypeException
     */
    public function testExpectsStringCompatibleType()
    {
        $this->validator->isValid(new \stdClass(), new Amex());
    }

    /**
     * @dataProvider getValidAmexs
     */
    public function testValidAmexs($amex)
    {
        $this->assertTrue($this->validator->isValid($amex, new Amex()));
    }

    public function getValidAmexs()
    {
        return array(
            array('378282246310005'),
            array('371449635398431'),
            array('378734493671000'),
        );
    }

    /**
     * @dataProvider getInvalidAmexs
     */
    public function testInvalidAmexs($amex)
    {
        $this->assertFalse($this->validator->isValid($amex, new Amex()));
    }

    public function getInvalidAmexs()
    {
        return array(
            array('4111111111111111'),
            array('4012888888881881'),
            array('4222222222222'),
            array('5555555555554444'),
            array('5105105105105100'),
        );
    }
}