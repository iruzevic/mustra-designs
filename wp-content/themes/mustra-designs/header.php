<?php

/**
 * Main header file
 *
 * @package MustraDesigns
 */

use MustraDesignsVendor\EightshiftLibs\Helpers\Helpers;
use MustraDesigns\ThemeOptions\ThemeOptions;

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<?php
	// Head component.
	echo Helpers::render('head');

	wp_head();
	?>
</head>
<body <?php body_class(); ?>>

<?php
// Header reusable block.
$headerPartialId = get_option(ThemeOptions::OPTION_NAME)['header'] ?? '';
ThemeOptions::renderPartial($headerPartialId);
?>

<main class="main-content layout-base" id="main-content">
