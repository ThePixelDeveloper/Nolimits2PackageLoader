<?php

namespace spec\NolimitsPark;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ParkInformationSpec extends ObjectBehavior
{
    function let()
    {
        $parkXml = new \SimpleXMLElement(<<<COASTER
<?xml version="1.0" encoding="UTF-8"?>
<park>
  <coaster>
    <name>X2</name>
    <coasterstyleid>22</coasterstyleid>
    <numtrains>3</numtrains>
    <maxheight>68.1396</maxheight>
    <minheight>3.03157</minheight>
    <tracklength>1218.85</tracklength>
    <tracklengthwostorage>1139.7</tracklengthwostorage>
  </coaster>
  <coaster>
    <name>Viper</name>
    <coasterstyleid>1</coasterstyleid>
    <numtrains>3</numtrains>
    <maxheight>61.76</maxheight>
    <minheight>5.90818</minheight>
    <tracklength>1233.5</tracklength>
    <tracklengthwostorage>1167.85</tracklengthwostorage>
  </coaster>
  <parkfile>Two Arrows Park.nl2park</parkfile>
  <author>ole</author>
  <description>World&apos;s first 4D-Coaster and a 7-Inversion-Multi-Looper</description>
  <previewimage>preview.jpg</previewimage>
  <encrypted>false</encrypted>
  <filesprefix>files</filesprefix>
</park>
COASTER
        );

        $this->beConstructedWith($parkXml);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('NolimitsPark\ParkInformation');
    }

    function it_should_have_a_parkfile()
    {
        $this->getParkFile()->shouldReturn('Two Arrows Park.nl2park');
    }

    function it_should_have_an_author()
    {
        $this->getAuthor()->shouldReturn('ole');
    }

    function it_should_have_a_description()
    {
        $this->getDescription()->shouldReturn('World\'s first 4D-Coaster and a 7-Inversion-Multi-Looper');
    }

    function it_should_have_a_preview_image()
    {
        $this->getPreviewImage()->shouldReturn('preview.jpg');
    }

    function it_should_have_an_encrypted_flag()
    {
        $this->getEncryptedFlag()->shouldReturn(false);
    }

    function it_should_have_a_files_prefix()
    {
        $this->getFilesPrefix()->shouldReturn('files');
    }

    function it_should_have_coasters()
    {
        $this->getCoasters()->shouldBeAnInstanceOf('NolimitsPark\CoasterIterator');
    }
}
