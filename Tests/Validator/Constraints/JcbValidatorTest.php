<?php
namespace Pixelavengers\Bundle\ExtraValidatorBundle\Tests\Validator\Constraints;

use Pixelavengers\Bundle\ExtraValidatorBundle\Validator\Constraints\Jcb;
use Pixelavengers\Bundle\ExtraValidatorBundle\Validator\Constraints\JcbValidator;

class JcbValidatorTest extends \PHPUnit_Framework_TestCase
{
    protected $validator;

    protected function setUp()
    {
        $this->validator = new JcbValidator();
    }

    protected function tearDown()
    {
        $this->validator = null;
    }

    public function testNullIsValid()
    {
        $this->assertTrue($this->validator->isValid(null, new Jcb()));
    }

    public function testEmptyStringIsValid()
    {
        $this->assertTrue($this->validator->isValid('', new Jcb()));
    }

    /**
     * @expectedException Symfony\Component\Validator\Exception\UnexpectedTypeException
     */
    public function testExpectsStringCompatibleType()
    {
        $this->validator->isValid(new \stdClass(), new Jcb());
    }

    /**
     * @dataProvider getValidJcbs
     */
    public function testValidJcbs($jcb)
    {
        $this->assertTrue($this->validator->isValid($jcb, new Jcb()));
    }

    public function getValidJcbs()
    {
        return array(
            array('3530111333300000'),
            array('3566002020360505'),
        );
    }

    /**
     * @dataProvider getInvalidJcbs
     */
    public function testInvalidJcbs($jcb)
    {
        $this->assertFalse($this->validator->isValid($jcb, new Jcb()));
    }

    public function getInvalidJcbs()
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