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
     * @var Styles
     */
    protected $styles;

    /**
     * Park constructor.
     *
     * @param SimpleXMLElement $simpleXMLElement
     * @param Styles $styles
     */
    public function __construct(SimpleXMLElement $simpleXMLElement, Styles $styles)
    {
        $this->coasterXML = $simpleXMLElement;
        $this->styles = $styles;
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
     * @return string
     */
    public function getStyle()
    {
        return $this->styles->getLabel($this->getStyleId());
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
