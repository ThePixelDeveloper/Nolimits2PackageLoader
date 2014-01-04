<?php

namespace NolimitsPark;

class CoasterInformation
{
    /**
     * @var \SimpleXMLElement
     */
    protected $coaster;

    /**
     * @param \SimpleXMLElement $coaster
     */
    public function __construct(\SimpleXMLElement $coaster)
    {
        $this->coaster = $coaster;
    }

    public function getName()
    {
        return (string) $this->coaster->name;
    }

    public function getCoasterStyleId()
    {
        return (int) $this->coaster->coasterstyleid;
    }

    public function getMaxHeight()
    {
        return (float) $this->coaster->maxheight;
    }

    public function getMinHeight()
    {
        return (float) $this->coaster->minheight;
    }

    public function getTrackLength()
    {
        return (float) $this->coaster->tracklength;
    }

    public function getTrackLengthWithoutStorage()
    {
        return (float) $this->coaster->tracklengthwostorage;
    }

    public function getCoasterStyle(CoasterStyleTypes $coasterStyleTypes)
    {
        return $coasterStyleTypes->getCoasterStyles()[$this->getCoasterStyleId()];
    }
}
