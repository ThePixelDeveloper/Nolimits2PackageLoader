<?php

namespace Thepixeldeveloper\Nolimits2PackageLoader;

use Countable;
use Iterator;
use SimpleXMLElement;

/**
 * Class Coasters
 * @package Thepixeldeveloper\Nolimits2PackageLoader
 */
class Coasters implements Iterator, Countable
{
    /**
     * @var int
     */
    protected $position = 0;

    /**
     * @var SimpleXMLElement
     */
    protected $parkXML;

    /**
     * Coasters constructor.
     * @param SimpleXMLElement $parkXML
     */
    public function __construct(SimpleXMLElement $parkXML)
    {
        $this->parkXML = $parkXML;
    }

    /**
     * @return Coaster
     */
    public function current()
    {
        return new Coaster($this->parkXML->coaster[$this->position]);
    }

    /**
     *
     */
    public function next()
    {
        $this->position++;
    }

    /**
     * @return int
     */
    public function key()
    {
        return $this->position;
    }

    /**
     * @return bool
     */
    public function valid()
    {
        return isset($this->parkXML->coaster[$this->position]);
    }

    /**
     *
     */
    public function rewind()
    {
        $this->position--;
    }

    /**
     * @return int
     */
    public function count()
    {
        return count($this->parkXML->coaster);
    }
}
