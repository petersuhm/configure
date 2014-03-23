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

    function it_sets_and_gets_a_value()
    {
        $this->set('foo', 'bar');
        $this->get('foo')->shouldReturn('bar');

        $this->set('bar', 'baz');
        $this->get('bar')->shouldReturn('baz');
    }

    function it_throws_exception_if_key_is_unknown()
    {
        $this->shouldThrow('Petersuhm\Configure\Exception\InvalidKeyException')
             ->duringGet('invalid');
    }

    function it_accepts_a_default_value()
    {
        // ...
    }

    function it_accepts_an_array_of_configurations()
    {
        // ...
    }
}
