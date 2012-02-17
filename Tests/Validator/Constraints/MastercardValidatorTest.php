<?php
namespace Pixelavengers\Bundle\ExtraValidatorBundle\Tests\Validator\Constraints;

use Pixelavengers\Bundle\ExtraValidatorBundle\Validator\Constraints\Mastercard;
use Pixelavengers\Bundle\ExtraValidatorBundle\Validator\Constraints\MastercardValidator;

class MastercardValidatorTest extends \PHPUnit_Framework_TestCase
{
    protected $validator;

    protected function setUp()
    {
        $this->validator = new MastercardValidator();
    }

    protected function tearDown()
    {
        $this->validator = null;
    }

    public function testNullIsValid()
    {
        $this->assertTrue($this->validator->isValid(null, new Mastercard()));
    }

    public function testEmptyStringIsValid()
    {
        $this->assertTrue($this->validator->isValid('', new Mastercard()));
    }

    /**
     * @expectedException Symfony\Component\Validator\Exception\UnexpectedTypeException
     */
    public function testExpectsStringCompatibleType()
    {
        $this->validator->isValid(new \stdClass(), new Mastercard());
    }

    /**
     * @dataProvider getValidMastercards
     */
    public function testValidMastercards($mastercard)
    {
        $this->assertTrue($this->validator->isValid($mastercard, new Mastercard()));
    }

    public function getValidMastercards()
    {
        return array(
            array('5555555555554444'),
            array('5105105105105100'),
        );
    }

    /**
     * @dataProvider getInvalidMastercards
     */
    public function testInvalidMastercards($mastercard)
    {
        $this->assertFalse($this->validator->isValid($mastercard, new Mastercard()));
    }

    public function getInvalidMastercards()
    {
        return array(
            array('4548813149400013'),
        );
    }
}