<?php

namespace Thepixeldeveloper\Nolimits2PackageLoader;

use SimpleXMLElement;
use ZipArchive;

class Package
{
    /**
     * @var ZipArchive
     */
    protected $archive;

    /**
     * @var Park
     */
    protected $park;

    /**
     * @var
     */
    protected $parkXml;

    /**
     * @var Coasters
     */
    protected $coasters;

    /**
     * Package constructor.
     *
     * @param ZipArchive $archive
     */
    public function __construct(ZipArchive $archive)
    {
        $this->archive = $archive;
    }

    /**
     * @return Park
     */
    public function getParkInformation()
    {
        if ($this->park === null) {
            $this->park = new Park($this->getParkXml());
        }

        return $this->park;

    }

    /**
     * @return Coasters
     */
    public function getCoasters()
    {
        if ($this->coasters === null) {
            $this->coasters = new Coasters($this->getParkXml(), new Styles());
        }

        return $this->coasters;
    }

    /**
     * @return resource
     */
    public function getPreviewImageStream()
    {
        $park = $this->getParkInformation();

        return $this->archive->getStream($park->getFilesPrefix() . DIRECTORY_SEPARATOR . $park->getPreviewImage());
    }

    /**
     * @return resource
     */
    public function getParkFileStream()
    {
        $park = $this->getParkInformation();

        return $this->archive->getStream($park->getFilesPrefix() . DIRECTORY_SEPARATOR . $park->getParkFile());
    }

    /**
     * @return SimpleXMLElement
     */
    protected function getParkXml()
    {
        if ($this->parkXml === null) {
            $this->parkXml = (new SimpleXMLElement($this->archive->getFromName('index.xml')))->park[0];
        }

        return $this->parkXml;
    }
}
