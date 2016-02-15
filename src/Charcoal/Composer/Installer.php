<?php

namespace Charcoal\Composer;

use Composer\Package\PackageInterface;
use Composer\Installer\LibraryInstaller;

class Installer extends LibraryInstaller
{
    protected $availableTypes = [ 'charcoal-module', 'charcoal-legacy' ];

    public function getInstallPath(PackageInterface $package)
    {
        $type = $package->getType();

        if ($type === 'charcoal-legacy') {
            return 'www/charcoal/';
        }

        $prettyName = $package->getPrettyName();
        if (strpos($prettyName, '/') !== false) {
            list($vendor, $name) = explode('/', $prettyName);
        } else {
            $vendor = '';
            $name = $prettyName;
        }

        $module_name = str_replace([ 'charcoal-', 'module-' ], '', $name);

        return 'www/modules/'.$module_name;
    }

    public function supports($packageType)
    {
        return in_array($packageType, $this->availableTypes);
    }
}
