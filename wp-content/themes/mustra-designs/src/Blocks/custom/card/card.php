<?php

/**
 * Card block template.
 *
 * @package MustraDesigns
 */

use MustraDesignsVendor\EightshiftLibs\Helpers\Helpers;

echo Helpers::render('card', Helpers::props('card', $attributes));
