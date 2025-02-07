<?php

/**
 * Paragraph component template.
 *
 * @package MustraDesigns
 */

use MustraDesignsVendor\EightshiftLibs\Helpers\Helpers;

$manifest = Helpers::getManifestByDir(__DIR__);

$paragraphUse = Helpers::checkAttr('paragraphUse', $attributes, $manifest);

if (!$paragraphUse) {
	return;
}

$additionalClass = $attributes['additionalClass'] ?? '';

$paragraphContent = Helpers::checkAttr('paragraphContent', $attributes, $manifest);

if (!$paragraphContent) {
	return;
}
?>

<p class="<?php echo esc_attr(Helpers::getTwClasses($attributes, $manifest, $additionalClass)); ?>">
	<?php
		// phpcs:ignore Eightshift.Security.HelpersEscape.OutputNotEscaped
		echo $paragraphContent;
	?>
</p>
