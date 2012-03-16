<?php
namespace Pixelavengers\Bundle\ExtraValidatorBundle\Tests\Validator\Constraints\ES;

use Pixelavengers\Bundle\ExtraValidatorBundle\Validator\Constraints\ES\FixedPhoneNumber;
use Pixelavengers\Bundle\ExtraValidatorBundle\Validator\Constraints\ES\FixedPhoneNumberValidator;

class FixedPhoneNumberTest extends \PHPUnit_Framework_TestCase
{
    protected $validator;

    protected function setUp()
    {
        $this->validator = new FixedPhoneNumberValidator();
    }

    protected function tearDown()
    {
        $this->validator = null;
    }

    public function testNullIsValid()
    {
        $this->assertTrue($this->validator->isValid(null, new FixedPhoneNumber()));
    }

    public function testEmptyStringIsValid()
    {
        $this->assertTrue($this->validator->isValid('', new FixedPhoneNumber()));
    }

    /**
     * @expectedException Symfony\Component\Validator\Exception\UnexpectedTypeException
     */
    public function testExpectsStringCompatibleType()
    {
        $this->validator->isValid(new \stdClass(), new FixedPhoneNumber());
    }

    /**
     * @dataProvider getValidFixedPhoneNumbers
     */
    public function testValidFixedPhoneNumbers($number)
    {
        $this->assertTrue($this->validator->isValid($number, new FixedPhoneNumber()));
    }

    public function getValidFixedPhoneNumbers()
    {
        return array(
            array('932192008'),
            array('977362181'),
        );
    }

    /**
     * @dataProvider getInvalidFixedPhoneNumbers
     */
    public function testInvalidFixedPhoneNumbers($number)
    {
        $this->assertFalse($this->validator->isValid($number, new FixedPhoneNumber()));
    }

    public function getInvalidFixedPhoneNumbers()
    {
        return array(
            array('93219200'),
            array('9321920089'),
            array('656450386'),
            array('656450381'),
        );
    }
}