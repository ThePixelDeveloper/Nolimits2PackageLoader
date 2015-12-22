<?php

namespace Thepixeldeveloper\Nolimits2PackageLoader;

use SimpleXMLElement;

/**
 * Class Coaster
 *
 * @package Thepixeldeveloper\Nolimits2PackageLoader
 */
class Coaster
{
    /**
     * @var SimpleXMLElement
     */
    protected $coasterXML;

    /**
     * Park constructor.
     *
     * @param SimpleXMLElement $simpleXMLElement
     */
    public function __construct(SimpleXMLElement $simpleXMLElement)
    {
        $this->coasterXML = $simpleXMLElement;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return (string) $this->coasterXML->name;
    }

    /**
     * @return int
     */
    public function getStyleId()
    {
        return (int) $this->coasterXML->coasterstyleid;
    }

    /**
     * @return int
     */
    public function getNumberOfTrains()
    {
        return (int) $this->coasterXML->numtrains;
    }

    /**
     * @return float
     */
    public function getMaxHeight()
    {
        return (double) $this->coasterXML->maxheight;
    }

    /**
     * @return float
     */
    public function getMinHeight()
    {
        return (double) $this->coasterXML->minheight;
    }

    /**
     * @return float
     */
    public function getTrackLength()
    {
        return (double) $this->coasterXML->tracklength;
    }

    /**
     * @return float
     */
    public function getTrackLengthWithoutStorage()
    {
        return (double) $this->coasterXML->tracklengthwostorage;
    }
}
