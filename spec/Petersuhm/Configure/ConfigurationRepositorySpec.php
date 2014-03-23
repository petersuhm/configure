<?php

namespace spec\Petersuhm\Configure;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ConfigurationRepositorySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Petersuhm\Configure\ConfigurationRepository');
    }

    function it_is_iterable()
    {
        $this->shouldImplement('IteratorAggregate');
        $this->getIterator()->shouldHaveType('ArrayIterator');
    }
}
