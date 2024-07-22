<?php

/**
 * Display footer.
 *
 * @package MustraDesigns
 */

use MustraDesigns\ThemeOptions\ThemeOptions;

?>

</main>

<footer class="layout-base">
<?php
// Footer reusable block.
$footerPartialId = get_option(ThemeOptions::OPTION_NAME)['footer'] ?? '';
ThemeOptions::renderPartial($footerPartialId);
?>
</footer>

<?php
wp_footer();
?>
</body>
</html>
