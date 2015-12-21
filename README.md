Thepixeldeveloper\Nolimits2PackageLoader
=========================

[![Author](http://img.shields.io/badge/author-@colonelrosa-blue.svg)](https://twitter.com/colonelrosa)
[![Build Status](https://img.shields.io/travis/ThePixelDeveloper/NolimitsCoaster2PackageLoader/master.svg)](https://travis-ci.org/ThePixelDeveloper/NolimitsCoaster2PackageLoader)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg)](LICENSE)
[![Packagist Version](https://img.shields.io/packagist/v/thepixeldeveloper/nolimitscoaster2packageloader.svg)](https://packagist.org/packages/thepixeldeveloper/nolimitscoaster2packageloader)
[![Total Downloads](https://img.shields.io/packagist/dt/thepixeldeveloper/nolimitscoaster2packageloader.svg)](https://packagist.org/packages/thepixeldeveloper/nolimitscoaster2packageloader)
[![SensioLabsInsight](https://img.shields.io/sensiolabs/i/ed6d56e8-c908-44dc-9154-a8edc8b168bc.svg)](https://insight.sensiolabs.com/projects/ed6d56e8-c908-44dc-9154-a8edc8b168bc)

When given a package file (nlpkg) produced by [No Limits Coaster 2](http://www.nolimitscoaster.com/) will return information about the park and roller coasters.

Basic Usage
-----

**Did you know?** _A nlpkg file is the same as a ZIP file_

``` php
$package = PackageLoader::createFactory('/path/to/park.nlpkg');

// Basic park information
$information = $package->getParkInformation();
$information->getAuthor();

// Raw preview image data
$image = $package->getPreviewImage();

// Raw NL2 park data
$park = $package->getParkFile();

// Coaster information (Iterator)
$coasters = $package->getCoasters();

foreach ($coasters as $coaster) {
    $name = $coaster->getName();
    $type = $coaster->getCoasterType(new CoasterStyleTypes);
}
```
