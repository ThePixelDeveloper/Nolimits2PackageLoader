<?php

namespace spec\Thepixeldeveloper\Nolimits2PackageLoader;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use ZipArchive;

class PackageSpec extends ObjectBehavior
{
    function let(ZipArchive $archive)
    {
        $xml = <<<XML
<?xml version="1.0" encoding="UTF-8"?>
<root>
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
    <parkfile>Raptor.nl2park</parkfile>
    <author>Beta</author>
    <description>Raptor by Beta
CREDITS:
nSeven - Foliage
TurboCoaster - Environment
TheCodeMaster - Custom Roar Sound
Track Work - Beta

</description>
    <previewimage>screenshot-2015-12-21-07-57-45.png</previewimage>
    <encrypted>false</encrypted>
    <filesprefix>files</filesprefix>
  </park>
</root>
XML;

        $archive->getFromName('index.xml')->willReturn($xml);
        $archive->getStream('files/Raptor.nl2park')->willReturn('stream');
        $archive->getStream('files/screenshot-2015-12-21-07-57-45.png')->willReturn('stream');

        $this->beConstructedWith($archive);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Thepixeldeveloper\Nolimits2PackageLoader\Package');
    }

    function it_should_return_park_information()
    {
        $this->getParkInformation()->shouldBeAnInstanceOf('Thepixeldeveloper\Nolimits2PackageLoader\Park');
    }

    function it_should_return_coasters()
    {
        $this->getCoasters()->shouldBeAnInstanceOf('Thepixeldeveloper\Nolimits2PackageLoader\Coasters');
    }

    function it_should_return_a_resource_to_a_preview_image()
    {
        $this->getPreviewImageStream()->shouldReturn('stream');
    }

    function it_should_return_a_resource_to_a_park_file()
    {
        $this->getParkFileStream()->shouldReturn('stream');
    }
}
