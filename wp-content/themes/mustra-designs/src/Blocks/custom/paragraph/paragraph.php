<?php

/**
 * Paragraph block template.
 *
 * @package MustraDesigns
 */

use MustraDesignsVendor\EightshiftLibs\Helpers\Helpers;

$manifest = Helpers::getManifestByDir(__DIR__);

echo Helpers::render('paragraph', Helpers::props('paragraph', $attributes, [
	'additionalClass' => Helpers::getTwClasses($attributes, $manifest),
]));
