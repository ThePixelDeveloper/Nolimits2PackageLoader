<?php

namespace Thepixeldeveloper\Nolimits2PackageLoader;

use SimpleXMLElement;

class Park
{
    /**
     * @var SimpleXMLElement
     */
    protected $parkXML;

    /**
     * Park constructor.
     *
     * @param SimpleXMLElement $simpleXMLElement
     */
    public function __construct(SimpleXMLElement $simpleXMLElement)
    {
        $this->parkXML = $simpleXMLElement;
    }

    /**
     * @return string
     */
    public function getParkFile()
    {
        return (string) $this->parkXML->parkfile;
    }

    /**
     * @return string
     */
    public function getAuthor()
    {
        return (string) $this->parkXML->author;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return (string) trim($this->parkXML->description);
    }

    /**
     * @return string
     */
    public function getPreviewImage()
    {
        return (string) $this->parkXML->previewimage;
    }

    /**
     * @return bool
     */
    public function isEncrypted()
    {
        return (string) $this->parkXML->encrypted === 'true';
    }

    /**
     * @return string
     */
    public function getFilesPrefix()
    {
        return (string) $this->parkXML->filesprefix;
    }

    /**
     * @return int
     */
    public function getCoasterCount()
    {
        return count($this->parkXML->coaster);
    }
}
