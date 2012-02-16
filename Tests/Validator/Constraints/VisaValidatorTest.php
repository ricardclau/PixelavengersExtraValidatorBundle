<?php
namespace Pixelavengers\Bundle\ExtraValidatorBundle\Tests\Validator\Constraints;

use Pixelavengers\Bundle\ExtraValidatorBundle\Validator\Constraints\Visa;
use Pixelavengers\Bundle\ExtraValidatorBundle\Validator\Constraints\VisaValidator;

class VisaValidatorTest extends \PHPUnit_Framework_TestCase
{
    protected $context;
    protected $validator;

    protected function setUp()
    {
        $this->context = $this->getMock('Symfony\Component\Validator\ExecutionContext', array(), array(), '', false);
        $this->validator = new VisaValidator();
        $this->validator->initialize($this->context);
    }

    protected function tearDown()
    {
        $this->context = null;
        $this->validator = null;
    }

    public function testNullIsValid()
    {
        $this->context->expects($this->never())
            ->method('addViolation');

        $this->assertTrue($this->validator->isValid(null, new Visa()));
    }

    public function testEmptyStringIsValid()
    {
        $this->context->expects($this->never())
            ->method('addViolation');

        $this->assertTrue($this->validator->isValid('', new Visa()));
    }

    /**
     * @expectedException Symfony\Component\Validator\Exception\UnexpectedTypeException
     */
    public function testExpectsStringCompatibleType()
    {
        $this->validator->isValid(new \stdClass(), new Visa());
    }

    /**
     * @dataProvider getValidVisas
     */
    public function testValidUrls($visa)
    {
        $this->context->expects($this->never())
            ->method('addViolation');

        $this->assertTrue($this->validator->isValid($visa, new Visa()));
    }

    public function getValidVisas()
    {
        return array(
            array('4548812049400004'),
        );
    }

    /**
     * @dataProvider getInvalidVisas
     */
    public function testInvalidVisas($visa)
    {
        $constraint = new Visa(array(
            'message' => 'myMessage'
        ));

        $this->context->expects($this->once())
            ->method('addViolation')
            ->with('myMessage', array(
                '{{ value }}' => $visa,
            ));

        $this->assertFalse($this->validator->isValid($visa, $constraint));
    }

    public function getInvalidVisas()
    {
        return array(
            array('4548812049400003'),
        );
    }
}