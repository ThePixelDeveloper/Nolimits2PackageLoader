<?php

namespace spec\Thepixeldeveloper\Nolimits2PackageLoader;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use SimpleXMLElement;

class CoasterSpec extends ObjectBehavior
{
    function let()
    {
        $data = <<<XML
<coaster>
    <name>Raptor</name>
    <coasterstyleid>62</coasterstyleid>
    <numtrains>1</numtrains>
    <maxheight>45.456</maxheight>
    <minheight>-6.27598</minheight>
    <tracklength>1201.2</tracklength>
    <tracklengthwostorage>1201.2</tracklengthwostorage>
</coaster>
XML;

        $simpleXMLElement = new SimpleXMLElement($data);

        $this->beConstructedWith($simpleXMLElement);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Thepixeldeveloper\Nolimits2PackageLoader\Coaster');
    }

    function it_should_return_the_coaster_name()
    {
        $this->getName()->shouldReturn('Raptor');
    }

    function it_should_return_the_coaster_style_id()
    {
        $this->getStyleId()->shouldReturn(62);
    }

    function it_should_return_the_number_of_trains()
    {
        $this->getNumberOfTrains()->shouldReturn(1);
    }

    function it_should_return_max_height()
    {
        $this->getMaxHeight()->shouldReturn(45.456);
    }

    function it_should_return_min_height()
    {
        $this->getMinHeight()->shouldReturn(-6.27598);
    }

    function it_should_return_track_length()
    {
        $this->getTrackLength()->shouldReturn(1201.2);
    }

    function it_should_return_track_length_without_storage()
    {
        $this->getTrackLengthWithoutStorage()->shouldReturn(1201.2);
    }
}
