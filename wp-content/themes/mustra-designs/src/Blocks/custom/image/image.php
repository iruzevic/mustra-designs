<?php

/**
 * Image block template.
 *
 * @package MustraDesigns
 */

use MustraDesignsVendor\EightshiftLibs\Helpers\Helpers;

echo Helpers::render('image', Helpers::props('image', $attributes));
