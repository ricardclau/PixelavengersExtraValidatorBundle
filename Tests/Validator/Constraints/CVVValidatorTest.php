<?php
namespace Pixelavengers\Bundle\ExtraValidatorBundle\Tests\Validator\Constraints;

use Pixelavengers\Bundle\ExtraValidatorBundle\Validator\Constraints\CVV;
use Pixelavengers\Bundle\ExtraValidatorBundle\Validator\Constraints\CVVValidator;

class CVVValidatorTest extends \PHPUnit_Framework_TestCase
{
    protected $validator;

    protected function setUp()
    {
        $this->validator = new CVVValidator();
    }

    protected function tearDown()
    {
        $this->validator = null;
    }

    public function testNullIsValid()
    {
        $this->assertTrue($this->validator->isValid(null, new CVV()));
    }

    public function testEmptyStringIsValid()
    {
        $this->assertTrue($this->validator->isValid('', new CVV()));
    }

    /**
     * @expectedException Symfony\Component\Validator\Exception\UnexpectedTypeException
     */
    public function testExpectsStringCompatibleType()
    {
        $this->validator->isValid(new \stdClass(), new CVV());
    }

    /**
     * @dataProvider getValidCVVs
     */
    public function testValidCVVs($cvv)
    {
        $this->assertTrue($this->validator->isValid($cvv, new CVV()));
    }

    public function getValidCVVs()
    {
        return array(
            array('123'),
            array('1234'),
            array(123),
	    array(1234),
        );
    }

    /**
     * @dataProvider getInvalidCVVs
     */
    public function testInvalidCVVs($cvv)
    {
        $this->assertFalse($this->validator->isValid($cvv, new CVV()));
    }

    public function getInvalidCVVs()
    {
        return array(
            array('4'),
            array('40'),
            array('42222'),
            array('aaaaa'),
            array(' '),
        );
    }
}
