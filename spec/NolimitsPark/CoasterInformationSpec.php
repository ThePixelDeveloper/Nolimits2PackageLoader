<?php

namespace spec\Nolimits\Bundle\ParkBundle\NolimitsPark;

use NolimitsPark\CoasterStyleTypes;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CoasterInformationSpec extends ObjectBehavior
{
    function let()
    {
        $xml = new \SimpleXMLElement(<<<COASTER
<?xml version="1.0" encoding="UTF-8"?>
<root>
  <name>X2</name>
  <coasterstyleid>22</coasterstyleid>
  <numtrains>3</numtrains>
  <maxheight>68.1396</maxheight>
  <minheight>3.03157</minheight>
  <tracklength>1218.85</tracklength>
  <tracklengthwostorage>1139.7</tracklengthwostorage>
</root>
COASTER
        );

        $this->beConstructedWith($xml);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('NolimitsPark\CoasterInformation');
    }

    function it_returns_a_name()
    {
        $this->getName()->shouldReturn('X2');
    }

    function it_returns_a_coaster_style_id()
    {
        $this->getCoasterStyleId()->shouldReturn(22);
    }

    function it_returns_a_coaster_style(CoasterStyleTypes $coasterStyleTypes)
    {
        $coasterStyleTypes->getCoasterStyles()->willReturn([22 => 'Arrow 4D']);

        $this->getCoasterStyle($coasterStyleTypes)->shouldReturn('Arrow 4D');
    }

    function it_returns_a_max_height()
    {
        $this->getMaxHeight()->shouldReturn(68.1396);
    }

    function it_returns_a_min_height()
    {
        $this->getMinHeight()->shouldReturn(3.03157);
    }

    function it_returns_a_track_length()
    {
        $this->getTrackLength()->shouldReturn(1218.85);
    }

    function it_returns_track_length_without_storage()
    {
        $this->getTrackLengthWithoutStorage()->shouldReturn(1139.7);
    }
}
