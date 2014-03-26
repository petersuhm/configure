<?php

namespace spec\Petersuhm\Configure\Exception;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class FileNotFoundExceptionSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Petersuhm\Configure\Exception\FileNotFoundException');
        $this->shouldHaveType('\Exception');
    }
}
