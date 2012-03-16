<?php
namespace Pixelavengers\Bundle\ExtraValidatorBundle\Tests\Validator\Constraints;

use Pixelavengers\Bundle\ExtraValidatorBundle\Validator\Constraints\ESSeguridadSocial;
use Pixelavengers\Bundle\ExtraValidatorBundle\Validator\Constraints\ESSeguridadSocialValidator;

class ESSeguridadSocialTest extends \PHPUnit_Framework_TestCase
{
    protected $validator;

    protected function setUp()
    {
        $this->validator = new ESSeguridadSocialValidator();
    }

    protected function tearDown()
    {
        $this->validator = null;
    }

    public function testNullIsValid()
    {
        $this->assertTrue($this->validator->isValid(null, new ESSeguridadSocial()));
    }

    public function testEmptyStringIsValid()
    {
        $this->assertTrue($this->validator->isValid('', new ESSeguridadSocial()));
    }

    /**
     * @expectedException Symfony\Component\Validator\Exception\UnexpectedTypeException
     */
    public function testExpectsStringCompatibleType()
    {
        $this->validator->isValid(new \stdClass(), new ESSeguridadSocial());
    }

    /**
     * @dataProvider getValidESSeguridadSocialNumbers
     */
    public function testValidESSeguridadSocialNumbers($number)
    {
        $this->assertTrue($this->validator->isValid($number, new ESSeguridadSocial()));
    }

    public function getValidESSeguridadSocialNumbers()
    {
        return array(
            array('28123456742'),
            array('281234567840'),
        );
    }

    /**
     * @dataProvider getInvalidESSeguridadSocialNumbers
     */
    public function testInvalidESSeguridadSocialNumbers($number)
    {
        $this->assertFalse($this->validator->isValid($number, new ESSeguridadSocial()));
    }

    public function getInvalidESSeguridadSocialNumbers()
    {
        return array(
            array('2812345678'),
            array('281234567401'),
            array('33333333333'),
            array('4444444444'),
        );
    }
}
