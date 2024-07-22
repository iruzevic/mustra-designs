<?php

/**
 * List block template.
 *
 * @package MustraDesigns
 */

use MustraDesignsVendor\EightshiftLibs\Helpers\Helpers;

$manifest = Helpers::getManifestByDir(__DIR__);

echo Helpers::render('list', Helpers::props('list', $attributes, [
	'additionalClass' => Helpers::getTwClasses($attributes, $manifest),
]));
