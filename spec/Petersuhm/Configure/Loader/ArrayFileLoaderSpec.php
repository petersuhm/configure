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
}
