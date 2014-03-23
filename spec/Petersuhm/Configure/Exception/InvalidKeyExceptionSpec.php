<?php

namespace spec\Petersuhm\Configure\Exception;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class InvalidKeyExceptionSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Petersuhm\Configure\Exception\InvalidKeyException');
        $this->shouldHaveType('\Exception');
    }
}
