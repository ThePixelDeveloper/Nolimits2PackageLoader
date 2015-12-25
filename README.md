Thepixeldeveloper\Nolimits2PackageLoader
=========================

[![Author](http://img.shields.io/badge/author-@colonelrosa-blue.svg)](https://twitter.com/colonelrosa)
[![Build Status](https://img.shields.io/travis/ThePixelDeveloper/Nolimits2PackageLoader/master.svg)](https://travis-ci.org/ThePixelDeveloper/Nolimits2PackageLoader)
[![HHVM Status](http://hhvm.h4cc.de/badge/ThePixelDeveloper/Nolimits2PackageLoader.png?style=flat)](http://hhvm.h4cc.de/package/thepixeldeveloper/nolimits2packageloader)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg)](LICENSE)
[![Packagist Version](https://img.shields.io/packagist/v/ThePixelDeveloper/Nolimits2PackageLoader.svg)](https://packagist.org/packages/thepixeldeveloper/nolimits2packageloader)
[![Total Downloads](https://img.shields.io/packagist/dt/thepixeldeveloper/nolimits2packageloader.svg)](https://packagist.org/packages/thepixeldeveloper/nolimits2packageloader)
[![SensioLabsInsight](https://img.shields.io/sensiolabs/i/71e1a221-f477-4649-b63f-c61a055fa0be.svg)](https://insight.sensiolabs.com/projects/71e1a221-f477-4649-b63f-c61a055fa0be)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/thepixeldeveloper/nolimits2packageloader/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/ThePixelDeveloper/Nolimits2PackageLoader/?branch=master)

When given a nlpkg produced by [No Limits Coaster 2](http://www.nolimitscoaster.com/) this library will return information about the park and roller coasters.

Basic Usage
-----

**Did you know?** _A nlpkg file is the same as a ZIP file_

``` php
// First load the package using ZipArchive
$zip = new \ZipArchive;
$zip->open('raptor.nl2pkg');

// Then give it to the package class to parse into useful information.
$package = new Thepixeldeveloper\Nolimits2PackageLoader\Package($zip);

/**
 * Instance of Thepixeldeveloper\Nolimits2PackageLoader\Park
 *
 * Contains information like the author and description.
 */
$parkInformation = $package->getParkInformation();

/**
 * Instance of Thepixeldeveloper\Nolimits2PackageLoader\Coasters
 *
 * Gives you an iterator which returns Coaster objects
 */
$coasters = $package->getCoasters();

/**
 * Instance of Thepixeldeveloper\Nolimits2PackageLoader\Coaster
 */
$coaster = $coasters->current();

$coaster->getStyle();          // Mack Launch
$coaster->getName();           // Raptor
$coaster->getNumberOfTrains(); // 1

/**
 * Examples of reading the preview image and park file
 */
$previewImage = $package->getPreviewImageStream();
$parkFile     = $package->getParkFileStream();
```
