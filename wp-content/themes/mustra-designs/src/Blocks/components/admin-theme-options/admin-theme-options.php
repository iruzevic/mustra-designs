<?php

/**
 * Theme options settings screen component template.
 *
 * @package MustraDesigns
 */

use MustraDesigns\ThemeOptions\ThemeOptions;
use MustraDesignsVendor\EightshiftLibs\Helpers\Helpers;

$manifest = Helpers::getManifestByDir(__DIR__);
$patterns = wp_json_encode(ThemeOptions::getPatterns());
?>

<input type="hidden" id="es-pattern-data" value="<?php echo esc_attr($patterns); ?>">

<div class="wrap" id="es-theme-options">
	<?php echo esc_html__('Loading...', 'mustra-designs'); ?>
</div>
