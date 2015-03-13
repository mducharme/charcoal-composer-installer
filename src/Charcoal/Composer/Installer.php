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
        $type = $this->package->getType();
        $prettyName = $this->package->getPrettyName();
        if (strpos($prettyName, '/') !== false) {
            list($vendor, $name) = explode('/', $prettyName);
        } 
        else {
            $vendor = '';
            $name = $prettyName;
        }

        $module_name = str_replace(['charcoal-', 'module-'], '', $name);

        return 'www/modules/'.$module_name;
    }

    /**
    * {@inheritDoc}
    */
    public function supports($packageType)
    {
        return ('charcoal-module' === $packageType);
    }
}
