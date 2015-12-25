<?php

namespace spec\Thepixeldeveloper\Nolimits2PackageLoader;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use SimpleXMLElement;
use Thepixeldeveloper\Nolimits2PackageLoader\Styles;

class CoastersSpec extends ObjectBehavior
{
    function let(Styles $styles)
    {
        $data = <<<XML
<park>
    <coaster>
        <name>Raptor</name>
        <coasterstyleid>62</coasterstyleid>
        <numtrains>1</numtrains>
        <maxheight>45.456</maxheight>
        <minheight>-6.27598</minheight>
        <tracklength>1201.2</tracklength>
        <tracklengthwostorage>1201.2</tracklengthwostorage>
    </coaster>
    <coaster>
        <name>Railing</name>
        <coasterstyleid>73</coasterstyleid>
        <numtrains>0</numtrains>
        <maxheight>5.23978</maxheight>
        <minheight>1.35446</minheight>
        <tracklength>111.384</tracklength>
        <tracklengthwostorage>111.384</tracklengthwostorage>
    </coaster>
</park>
XML;

        $simpleXMLElement = new SimpleXMLElement($data);

        $this->beConstructedWith($simpleXMLElement, $styles);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Thepixeldeveloper\Nolimits2PackageLoader\Coasters');
    }

    function it_should_return_the_correct_count()
    {
        $this->count()->shouldReturn(2);
    }

    function it_should_return_a_coaster_object()
    {
        $this->current()->shouldHaveType('Thepixeldeveloper\Nolimits2PackageLoader\Coaster');
    }
}
