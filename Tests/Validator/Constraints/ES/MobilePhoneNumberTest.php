<?php
namespace Pixelavengers\Bundle\ExtraValidatorBundle\Tests\Validator\Constraints\ES;

use Pixelavengers\Bundle\ExtraValidatorBundle\Validator\Constraints\ES\MobilePhoneNumber;
use Pixelavengers\Bundle\ExtraValidatorBundle\Validator\Constraints\ES\MobilePhoneNumberValidator;

class MobilePhoneNumberTest extends \PHPUnit_Framework_TestCase
{
    protected $validator;

    protected function setUp()
    {
        $this->validator = new MobilePhoneNumberValidator();
    }

    protected function tearDown()
    {
        $this->validator = null;
    }

    public function testNullIsValid()
    {
        $this->assertTrue($this->validator->isValid(null, new MobilePhoneNumber()));
    }

    public function testEmptyStringIsValid()
    {
        $this->assertTrue($this->validator->isValid('', new MobilePhoneNumber()));
    }

    /**
     * @expectedException Symfony\Component\Validator\Exception\UnexpectedTypeException
     */
    public function testExpectsStringCompatibleType()
    {
        $this->validator->isValid(new \stdClass(), new MobilePhoneNumber());
    }

    /**
     * @dataProvider getValidMobilePhoneNumbers
     */
    public function testValidMobilePhoneNumbers($number)
    {
        $this->assertTrue($this->validator->isValid($number, new MobilePhoneNumber()));
    }

    public function getValidMobilePhoneNumbers()
    {
        return array(
            array('656450385'),
            array('667107292'),
        );
    }

    /**
     * @dataProvider getInvalidMobilePhoneNumbers
     */
    public function testInvalidMobilePhoneNumbers($number)
    {
        $this->assertFalse($this->validator->isValid($number, new MobilePhoneNumber()));
    }

    public function getInvalidMobilePhoneNumbers()
    {
        return array(
            array('932192008'),
            array('977362181'),
            array('65645038'),
            array('6564503811'),
        );
    }
}