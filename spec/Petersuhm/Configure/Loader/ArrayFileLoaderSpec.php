<?php

namespace spec\Petersuhm\Configure\Loader;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ArrayFileLoaderSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('spec/fixtures/config.php');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Petersuhm\Configure\Loader\ArrayFileLoader');
        $this->shouldImplement('Petersuhm\Configure\Loader\FileLoaderInterface');
        $this->getPath()->shouldReturn('spec/fixtures/config.php');
    }

    function it_return_content_as_array()
    {
        $expected = array(
            'localization' => array(
                'lang' => 'da',
                'country' => 'dk'
            ),
            'app_name' => 'Configure'
        );
        $this->asArray()->shouldReturn($expected);
    }

    function it_throws_exception_if_file_doesnt_exist()
    {
        $this->shouldThrow('Petersuhm\Configure\Exception\FileNotFoundException')
             ->duringSetPath('foo.bar');
    }
}
