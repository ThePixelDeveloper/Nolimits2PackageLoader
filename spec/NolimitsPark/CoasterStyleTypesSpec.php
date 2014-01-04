<?php

namespace spec\NolimitsPark;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CoasterStyleTypesSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('\NolimitsPark\CoasterStyleTypes');
    }

    function it_should_provide_a_list_of_types()
    {
        $this->getCoasterStyles()->shouldBeArray();
    }
}
