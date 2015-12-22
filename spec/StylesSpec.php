<?php

namespace spec\Thepixeldeveloper\Nolimits2PackageLoader;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class StylesSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Thepixeldeveloper\Nolimits2PackageLoader\Styles');
    }

    function it_should_return_all_types()
    {
        $this->getStyles()->shouldBeArray();
    }

    function it_should_return_a_label_for_an_id()
    {
        $this->getLabel(0)->shouldReturn('Schwarzkopf Thriller (Classic)');
    }
}
