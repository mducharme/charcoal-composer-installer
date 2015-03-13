<?php

namespace Charcoal\Composer;

use Composer\Package\PackageInterface;
use Composer\Installer\LibraryInstaller;

class Installer extends LibraryInstaller
{
    /**
    * {@inheritDoc}
    */
    public function getPackageBasePath(PackageInterface $package)
    {
        var_dump($package->getPrettyName());
        return 'modules/'.substr($package->getPrettyName(), 23);
    }

    /**
    * {@inheritDoc}
    */
    public function supports($packageType)
    {
        return ('charcoal-module' === $packageType);
    }
}