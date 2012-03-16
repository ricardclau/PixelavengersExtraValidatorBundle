<?php
namespace Pixelavengers\Bundle\ExtraValidatorBundle\Tests\Validator\Constraints\ES;

use Pixelavengers\Bundle\ExtraValidatorBundle\Validator\Constraints\ES\PhoneNumber;
use Pixelavengers\Bundle\ExtraValidatorBundle\Validator\Constraints\ES\PhoneNumberValidator;

class PhoneNumberTest extends \PHPUnit_Framework_TestCase
{
    protected $validator;

    protected function setUp()
    {
        $this->validator = new PhoneNumberValidator();
    }

    protected function tearDown()
    {
        $this->validator = null;
    }

    public function testNullIsValid()
    {
        $this->assertTrue($this->validator->isValid(null, new PhoneNumber()));
    }

    public function testEmptyStringIsValid()
    {
        $this->assertTrue($this->validator->isValid('', new PhoneNumber()));
    }

    /**
     * @expectedException Symfony\Component\Validator\Exception\UnexpectedTypeException
     */
    public function testExpectsStringCompatibleType()
    {
        $this->validator->isValid(new \stdClass(), new PhoneNumber());
    }

    /**
     * @dataProvider getValidPhoneNumbers
     */
    public function testValidPhoneNumbers($number)
    {
        $this->assertTrue($this->validator->isValid($number, new PhoneNumber()));
    }

    public function getValidPhoneNumbers()
    {
        return array(
            array('932192008'),
            array('977362181'),
            array('656450385'),
            array('667107292'),
        );
    }

    /**
     * @dataProvider getInvalidPhoneNumbers
     */
    public function testInvalidPhoneNumbers($number)
    {
        $this->assertFalse($this->validator->isValid($number, new PhoneNumber()));
    }

    public function getInvalidPhoneNumbers()
    {
        return array(
            array('93219200'),
            array('9321920089'),
            array('65645038'),
            array('6564503811'),
        );
    }
}