<?php

/**
 * File that holds class for patterns admin menu.
 *
 * @package MustraDesigns\AdminMenus
 */

declare(strict_types=1);

namespace MustraDesigns\AdminMenus;

use MustraDesignsVendor\EightshiftLibs\AdminMenus\AbstractAdminMenu;

/**
 * AdminPatternsMenu class.
 */
class AdminPatternsMenu extends AbstractAdminMenu
{
	/**
	 * Patterns Capability.
	 */
	public const ADMIN_MENU_CAPABILITY = 'edit_posts';

	/**
	 * Menu slug for patterns menu.
	 *
	 * @var string
	 */
	public const ADMIN_MENU_SLUG = 'edit.php?post_type=wp_block';

	/**
	 * Menu icon for patterns menu.
	 *
	 * @var string
	 */
	public const ADMIN_MENU_ICON = 'dashicons-welcome-widgets-menus';

	/**
	 * Menu position for patterns menu.
	 *
	 * @var int
	 */
	public const ADMIN_MENU_POSITION = 4;

	/**
	 * Register all the hooks.
	 *
	 * @return void
	 */
	public function register(): void
	{
		\add_action(
			'admin_menu',
			function () {
				\add_menu_page(
					$this->getTitle(),
					$this->getMenuTitle(),
					$this->getCapability(),
					$this->getMenuSlug(),
					'', // @phpstan-ignore-line
					$this->getIcon(),
					$this->getPosition()
				);
			}
		);
	}

	/**
	 * Get the title to use for the admin page.
	 *
	 * @return string The text to be displayed in the title tags of the page when the menu is selected.
	 */
	protected function getTitle(): string
	{
		return \esc_html__('Patterns', 'mustra-designs');
	}

	/**
	 * Get the menu title to use for the admin menu.
	 *
	 * @return string The text to be used for the menu.
	 */
	protected function getMenuTitle(): string
	{
		return \esc_html__('Patterns', 'mustra-designs');
	}

	/**
	 * Get the capability required for patterns menu to be displayed.
	 *
	 * @return string The capability required for patterns menu to be displayed to the user.
	 */
	protected function getCapability(): string
	{
		return self::ADMIN_MENU_CAPABILITY;
	}

	/**
	 * Get the menu slug.
	 *
	 * @return string The slug name to refer to patterns menu by.
	 *                Should be unique for patterns menu page and only include lowercase alphanumeric,
	 *                dashes, and underscores characters to be compatible with sanitize_key().
	 */
	protected function getMenuSlug(): string
	{
		return self::ADMIN_MENU_SLUG;
	}

	/**
	 * Get the URL to the icon to be used for patterns menu.
	 *
	 * @return string The URL to the icon to be used for patterns menu.
	 *                * Pass a base64-encoded SVG using a data URI, which will be colored to match
	 *                  the color scheme. This should begin with 'data:image/svg+xml;base64,'.
	 *                * Pass the name of a Dashicons helper class to use a font icon,
	 *                  e.g. 'dashicons-chart-pie'.
	 *                * Pass 'none' to leave div.wp-menu-image empty so an icon can be added via CSS.
	 */
	protected function getIcon(): string
	{
		// If it's a custom SVG; base64 it.
		if (\substr(self::ADMIN_MENU_ICON, 0, 4) === '<svg') {
			return 'data:image/svg+xml;base64,' . base64_encode(self::ADMIN_MENU_ICON); // phpcs:ignore;
		}

		// Otherwise just treat it as a DashIcon.
		return self::ADMIN_MENU_ICON;
	}

	/**
	 * Get the position of the patterns menu.
	 *
	 * @return int Number that indicates the position of the menu.
	 * 5   - below Posts
	 * 10  - below Media
	 * 15  - below Links
	 * 20  - below Pages
	 * 25  - below comments
	 * 60  - below first separator
	 * 65  - below Plugins
	 * 70  - below Users
	 * 75  - below Tools
	 * 80  - below Settings
	 * 100 - below second separator
	 */
	protected function getPosition(): int
	{
		return self::ADMIN_MENU_POSITION;
	}

	/**
	 * Get the view component that will render correct view.
	 *
	 * @return string View uri.
	 */
	protected function getViewComponent(): string
	{
		return '';
	}

	/**
	 * Process the admin menu attributes.
	 *
	 * Here you can get any kind of metadata, query the database, etc..
	 * This data will be passed to the component view to be rendered out in the
	 * processAdminMenu parent method.
	 *
	 * @param array<string, mixed>|string $attr Raw admin menu attributes passed into the
	 *                           admin menu function.
	 *
	 * @return array<string, mixed> Processed admin menu attributes.
	 */
	protected function processAttributes($attr): array
	{
		return [];
	}
}
