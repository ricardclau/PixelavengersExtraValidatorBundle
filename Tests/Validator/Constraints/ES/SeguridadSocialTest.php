<?php
namespace Pixelavengers\Bundle\ExtraValidatorBundle\Tests\Validator\Constraints\ES;

use Pixelavengers\Bundle\ExtraValidatorBundle\Validator\Constraints\ES\SeguridadSocial;
use Pixelavengers\Bundle\ExtraValidatorBundle\Validator\Constraints\ES\SeguridadSocialValidator;

class SeguridadSocialTest extends \PHPUnit_Framework_TestCase
{
    protected $validator;

    protected function setUp()
    {
        $this->validator = new SeguridadSocialValidator();
    }

    protected function tearDown()
    {
        $this->validator = null;
    }

    public function testNullIsValid()
    {
        $this->assertTrue($this->validator->isValid(null, new SeguridadSocial()));
    }

    public function testEmptyStringIsValid()
    {
        $this->assertTrue($this->validator->isValid('', new SeguridadSocial()));
    }

    /**
     * @expectedException Symfony\Component\Validator\Exception\UnexpectedTypeException
     */
    public function testExpectsStringCompatibleType()
    {
        $this->validator->isValid(new \stdClass(), new SeguridadSocial());
    }

    /**
     * @dataProvider getValidSeguridadSocialNumbers
     */
    public function testValidSeguridadSocialNumbers($number)
    {
        $this->assertTrue($this->validator->isValid($number, new SeguridadSocial()));
    }

    public function getValidSeguridadSocialNumbers()
    {
        return array(
            array('28123456742'),
            array('281234567840'),
        );
    }

    /**
     * @dataProvider getInvalidSeguridadSocialNumbers
     */
    public function testInvalidSeguridadSocialNumbers($number)
    {
        $this->assertFalse($this->validator->isValid($number, new SeguridadSocial()));
    }

    public function getInvalidSeguridadSocialNumbers()
    {
        return array(
            array('2812345678'),
            array('281234567401'),
            array('33333333333'),
            array('4444444444'),
        );
    }
}
