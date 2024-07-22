<?php

/**
 * Heading block template.
 *
 * @package MustraDesigns
 */

use MustraDesignsVendor\EightshiftLibs\Helpers\Helpers;

$manifest = Helpers::getManifestByDir(__DIR__);

echo Helpers::render('heading', Helpers::props('heading', $attributes, [
	'additionalClass' => Helpers::getTwClasses($attributes, $manifest),
]));
