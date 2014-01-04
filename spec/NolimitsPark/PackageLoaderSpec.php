<?php

namespace spec\NolimitsPark;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PackageLoaderSpec extends ObjectBehavior
{
    function let(\ZipArchive $archive)
    {
        $archive->getFromName('index.xml')->willReturn(<<<COASTER
<?xml version="1.0" encoding="UTF-8"?>
<root>
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
</root>
COASTER
        );

        $archive->getFromName('files/preview.jpg')->willReturn('preview image data');
        $archive->getFromName('files/Two Arrows Park.nl2park')->willReturn('park data');

        $this->beConstructedWith($archive);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('NolimitsPark\PackageLoader');
    }

    function it_should_have_park_information()
    {
        $this->getParkInformation()->shouldBeAnInstanceOf('NolimitsPark\ParkInformation');
    }

    function it_should_have_a_preview_file()
    {
        $this->getPreviewImage()->shouldReturn('preview image data');
    }

    function it_should_have_a_park_file()
    {
        $this->getParkFile()->shouldReturn('park data');
    }

    function it_should_have_an_author()
    {
        $this->getParkInformation()->getAuthor()->shouldBe('ole');
    }

    function it_should_have_a_coaster()
    {
        $this->getParkInformation()->getCoasters()->current()->getName()->shouldBe('X2');
    }
}
