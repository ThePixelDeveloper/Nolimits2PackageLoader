Nolimits Coaster 2 Park API
===========================

This is a simple API to access Nolimits 2 Park files with. Usage:

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


Contributing
============

To contribute to the project ensure any patches are fully
tested and any documentation updated (if required). You can
run the tests with the following command:

    ./bin/phpspec

License
=======

Copyright 2013 Mathew Davies

The Nolimits Coaster 2 Package Loader was written by Mathew Davies
with the permissions of the No Limits Development Team for their
explicit use. Use of this code without the permission of Ole Lange
or the No Limits Development Team is strictly prohibited.
