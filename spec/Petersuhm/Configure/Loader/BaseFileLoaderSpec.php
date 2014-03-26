<?php

namespace spec\Petersuhm\Configure\Loader;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class BaseFileLoaderSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('spec/fixtures/config.php');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Petersuhm\Configure\Loader\BaseFileLoader');
        $this->shouldImplement('Petersuhm\Configure\Loader\FileLoaderInterface');
        $this->getPath()->shouldReturn('spec/fixtures/config.php');
    }

    function it_throws_exception_if_file_doesnt_exist()
    {
        $this->shouldThrow('Petersuhm\Configure\Exception\FileNotFoundException')
             ->duringSetPath('foo.bar');
    }
}
