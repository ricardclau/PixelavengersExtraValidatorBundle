<?php
namespace Pixelavengers\Bundle\ExtraValidatorBundle\Tests\Validator\Constraints;

use Pixelavengers\Bundle\ExtraValidatorBundle\Validator\Constraints\Discover;
use Pixelavengers\Bundle\ExtraValidatorBundle\Validator\Constraints\DiscoverValidator;

class DiscoverValidatorTest extends \PHPUnit_Framework_TestCase
{
    protected $validator;

    protected function setUp()
    {
        $this->validator = new DiscoverValidator();
    }

    protected function tearDown()
    {
        $this->validator = null;
    }

    public function testNullIsValid()
    {
        $this->assertTrue($this->validator->isValid(null, new Discover()));
    }

    public function testEmptyStringIsValid()
    {
        $this->assertTrue($this->validator->isValid('', new Discover()));
    }

    /**
     * @expectedException Symfony\Component\Validator\Exception\UnexpectedTypeException
     */
    public function testExpectsStringCompatibleType()
    {
        $this->validator->isValid(new \stdClass(), new Discover());
    }

    /**
     * @dataProvider getValidDiscovers
     */
    public function testValidDiscovers($discover)
    {
        $this->assertTrue($this->validator->isValid($discover, new Discover()));
    }

    public function getValidDiscovers()
    {
        return array(
            array('6011111111111117'),
            array('6011000990139424'),
        );
    }

    /**
     * @dataProvider getInvalidDiscovers
     */
    public function testInvalidDiscovers($discover)
    {
        $this->assertFalse($this->validator->isValid($discover, new Discover()));
    }

    public function getInvalidDiscovers()
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