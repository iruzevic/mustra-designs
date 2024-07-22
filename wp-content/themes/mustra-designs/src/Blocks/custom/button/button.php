<?php

/**
 * Button block template.
 *
 * @package MustraDesigns
 */

use MustraDesignsVendor\EightshiftLibs\Helpers\Helpers;

echo Helpers::render('button', Helpers::props('button', $attributes));
