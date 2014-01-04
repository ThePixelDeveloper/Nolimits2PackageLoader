<?php

namespace NolimitsPark;

class ParkInformation
{
    /**
     * @var \SimpleXMLElement[]
     */
    protected $park;

    /**
     * @param \SimpleXMLElement $park
     */
    public function __construct(\SimpleXMLElement $park)
    {
        $this->park = $park;
    }

    public function getParkFile()
    {
        return (string) $this->park->parkfile;
    }

    public function getAuthor()
    {
        return (string) $this->park->author;
    }

    public function getDescription()
    {
        return (string) $this->park->description;
    }

    public function getPreviewImage()
    {
        return (string) $this->park->previewimage;
    }

    public function getEncryptedFlag()
    {
        return $this->park->encrypted === 'true';
    }

    public function getFilesPrefix()
    {
        return (string) $this->park->filesprefix;
    }

    public function getCoasters()
    {
        return new CoasterIterator($this->park);
    }
}
