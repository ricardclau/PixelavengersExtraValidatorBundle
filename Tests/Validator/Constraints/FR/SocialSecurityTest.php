<?php
namespace Pixelavengers\Bundle\ExtraValidatorBundle\Tests\Validator\Constraints\FR;

use Pixelavengers\Bundle\ExtraValidatorBundle\Validator\Constraints\FR\SocialSecurity;
use Pixelavengers\Bundle\ExtraValidatorBundle\Validator\Constraints\FR\SocialSecurityValidator;

class SocialSecurityTest extends \PHPUnit_Framework_TestCase
{
    protected $validator;

    protected function setUp()
    {
        $this->validator = new SocialSecurityValidator();
    }

    protected function tearDown()
    {
        $this->validator = null;
    }

    public function testNullIsValid()
    {
        $this->assertTrue($this->validator->isValid(null, new SocialSecurity()));
    }

    public function testEmptyStringIsValid()
    {
        $this->assertTrue($this->validator->isValid('', new SocialSecurity()));
    }

    /**
     * @expectedException Symfony\Component\Validator\Exception\UnexpectedTypeException
     */
    public function testExpectsStringCompatibleType()
    {
        $this->validator->isValid(new \stdClass(), new SocialSecurity());
    }

    /**
     * @dataProvider getValidSocialSecurityNumbers
     */
    public function testValidSeguridadSocialNumbers($number)
    {
        $this->assertTrue($this->validator->isValid($number, new SocialSecurity()));
    }

    public function getValidSocialSecurityNumbers()
    {
        return array(
            array('253072B07354415'),
            array('253072A07300443'),
            array('253077507300483'),
        );
    }

    /**
     * @dataProvider getInvalidSocialSecurityNumbers
     */
    public function testInvalidSocialSecurityNumbers($number)
    {
        $this->assertFalse($this->validator->isValid($number, new SocialSecurity()));
    }

    public function getInvalidSocialSecurityNumbers()
    {
        return array(
            array('2812345678'),
            array('281234567401'),
            array('33333333333'),
            array('4444444444'),
        );
    }
}
