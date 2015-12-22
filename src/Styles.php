<?php

namespace Thepixeldeveloper\Nolimits2PackageLoader;

/**
 * Class Styles
 *
 * Map of all the coaster types. Key is the type ID and the value
 * is the user facing label.
 *
 * @package Thepixeldeveloper\Nolimits2PackageLoader
 */
class Styles
{
    /**
     * @var array
     */
    protected $styles = [
        0  => 'Schwarzkopf Thriller (Classic)',
        1  => 'Arrow Corkscrew',
        2  => 'Vekoma SLC',
        3  => 'B&M Sitdown',
        4  => 'B&M Inverted',
        5  => 'Intamin Hyper',
        6  => 'B&M Floorless',
        7  => 'B&M standup',
        8  => 'B&M Hyper',
        9  => 'GCI Millennium Flyer',
        10 => 'PTC 4 Seat',
        11 => 'PTC 6 Seat',
        12 => 'Morgan Trailered',
        13 => 'Premier LIM',
        14 => 'Vekoma Invertigo',
        15 => 'Intamin Inverted Impulse',
        16 => 'Arrow Suspended',
        18 => 'Vekoma Flying Dutchman',
        20 => 'Mauer Soehn Spinner',
        21 => 'B&M Diving',
        22 => 'Arrow 4D',
        23 => 'B&M Flying',
        33 => 'Intamin Rocket',
        34 => 'Vekoma Minetrain',
        35 => 'Vekoma Minetrain w/Locomotive',
        36 => 'Gerstlauer Typhoon',
        38 => 'Vekoma Motobike',
        39 => 'Gerstlauer Bobsled',
        41 => 'Gerstlauer Spinner ',
        47 => 'Gerlstauer Eurofighter',
        49 => 'Schwarzkopf Looping Star (Modern)',
        50 => 'Mauer Soehn X-Car',
        55 => 'Zamperla Spinner',
        62 => 'Mack Launch',
        63 => 'B&M V-Hyper ',
        64 => 'B&M V-Hyper w/Scoops',
        71 => 'Gravity Group Timberliner',
    ];

    /**
     * @return array
     */
    public function getStyles()
    {
        return $this->styles;
    }

    /**
     * @param  integer $styleId
     *
     * @return string
     */
    public function getLabel($styleId)
    {
        return $this->styles[$styleId];
    }
}
