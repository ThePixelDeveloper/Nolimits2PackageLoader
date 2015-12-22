<?php

namespace spec\Thepixeldeveloper\Nolimits2PackageLoader;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use SimpleXMLElement;

class ParkSpec extends ObjectBehavior
{
    function let()
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
XML;

        $simpleXMLElement = new SimpleXMLElement($data);

        $this->beConstructedWith($simpleXMLElement);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Thepixeldeveloper\Nolimits2PackageLoader\Park');
    }

    function it_should_return_a_park_file()
    {
        $this->getParkFile()->shouldReturn('Raptor.nl2park');
    }

    function it_should_return_the_author()
    {
        $this->getAuthor()->shouldReturn('Beta');
    }

    function it_should_return_the_description()
    {
        $this->getDescription()->shouldReturn(<<<DESC
Raptor by Beta
CREDITS:
nSeven - Foliage
TurboCoaster - Environment
TheCodeMaster - Custom Roar Sound
Track Work - Beta
DESC
);
    }

    function it_should_return_the_preview_image()
    {
        $this->getPreviewImage()->shouldReturn('screenshot-2015-12-21-07-57-45.png');
    }

    function it_should_return_if_the_file_is_encrypted()
    {
        $this->isEncrypted()->shouldReturn(false);
    }

    function it_should_return_the_files_prefix()
    {
        $this->getFilesPrefix()->shouldReturn('files');
    }

    function it_should_return_the_number_of_coasters()
    {
        $this->getCoasterCount()->shouldReturn(2);
    }
}
