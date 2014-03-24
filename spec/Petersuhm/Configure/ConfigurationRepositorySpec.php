<?php

namespace spec\Petersuhm\Configure;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Petersuhm\Configure\Loader\FileLoaderInterface;

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
        $this->get('key', 'default')->shouldReturn('default');

        $this->set('key', 'value');
        $this->get('key', 'default')->shouldReturn('value');
    }

    function it_accepts_an_array_of_configurations()
    {
        $this->set(array(
            'first_key' => 'first_value',
            'second_key' => 'second_value'
        ));
        $this->get('first_key')->shouldReturn('first_value');
        $this->get('second_key')->shouldReturn('second_value');
    }

    function it_flattens_multi_dimensional_arrays()
    {
        $this->set(array(
            'first_key' => 'first_value',

            'second_key' => array(
                'first_key_l2' => 'first_value_l2',
                'second_key_l2' => 'second_value_l2'
            ),

            'third_key' => array(
                'first_key_l2' => array(
                    'first_key_l3' => 'first_value_l3'
                ),
                'second_key_l2' => array(
                    'second_key_l3' => 'second_value_l3'
                )
            )
        ));
        $this->get('first_key')->shouldReturn('first_value');
        $this->get('second_key.first_key_l2')->shouldReturn('first_value_l2');
        $this->get('second_key.second_key_l2')->shouldReturn('second_value_l2');
        $this->get('third_key.first_key_l2.first_key_l3')->shouldReturn('first_value_l3');
        $this->get('third_key.second_key_l2.second_key_l3')->shouldReturn('second_value_l3');
    }

    function it_loads_from_file(FileLoaderInterface $loader)
    {
        $loader->asArray()->shouldBeCalled()->willReturn(array('foo' => 'bar'));
        $this->load($loader);
        $this->get('foo')->shouldReturn('bar');
    }
}
