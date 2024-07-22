<?php

/**
 * Modify WordPress admin behavior
 *
 * @package MustraDesigns\ModifyAdminAppearance
 */

declare(strict_types=1);

namespace MustraDesigns\ModifyAdminAppearance;

use MustraDesignsVendor\EightshiftLibs\Services\ServiceInterface;

/**
 * Class that modifies some administrator appearance
 *
 * Example: Change color based on environment, remove dashboard widgets etc.
 */
class ModifyAdminAppearance implements ServiceInterface
{
	/**
	 * List of admin color schemes.
	 *
	 * @var array<string, string>
	 */
	public const COLOR_SCHEMES = [
		'development' => 'fresh',
		'local' => 'fresh',
		'staging' => 'blue',
		'production' => 'sunrise',
	];

	/**
	 * Register all the hooks
	 *
	 * @return void
	 */
	public function register(): void
	{
		\add_filter('get_user_option_admin_color', [$this, 'adminColor'], 10, 0);
	}

	/**
	 * Method that changes admin colors based on environment variable
	 *
	 * @return string Modified color scheme..
	 */
	public function adminColor(): string
	{
		$env = \wp_get_environment_type();

		$colors = self::COLOR_SCHEMES;

		if (!isset($colors[$env])) {
			return $colors['development'];
		}

		return $colors[$env];
	}
}
