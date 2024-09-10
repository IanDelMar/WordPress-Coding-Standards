<?php
/**
 * WordPress Coding Standard.
 *
 * @package WPCS\WordPressCodingStandards
 * @link    https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards
 * @license https://opensource.org/licenses/MIT MIT
 */

namespace WordPressCS\WordPress\Sniffs\NamingConventions;

use WordPressCS\WordPress\AbstractValidSlugSniff;
use WordPressCS\WordPress\Helpers\WPReservedKeywordHelper;

/**
 * Validates taxonomy names.
 *
 * Checks taxonomy slugs for the presence of invalid characters, excessive
 * length, and reserved keywords.
 *
 * @link https://developer.wordpress.org/reference/functions/register_taxonomy/
 */
final class ValidTaxonomySlugSniff extends AbstractValidSlugSniff {

	/**
	 * Retrieve function and parameter(s) pairs this sniff is looking for.
	 *
	 * @return array<string, string|array<string>> Function parameter(s) pairs.
	 */
	protected function get_target_functions() {
		return array(
			'register_taxonomy' => array( 'taxonomy' ),
		);
	}

	/**
	 * Retrieve the slug type.
	 *
	 * @return string The slug type.
	 */
	protected function get_slug_type() {
		return 'taxonomy';
	}

	/**
	 * Retrieve the plural slug type.
	 *
	 * @return string The plural slug type.
	 */
	protected function get_slug_type_plural() {
		return 'taxonomies';
	}

	/**
	 * Retrieve regex to validate the characters that can be used as the
	 * taxonomy slug.
	 *
	 * @link https://developer.wordpress.org/reference/functions/register_taxonomy/
	 *
	 * @return string
	 */
	protected function get_valid_characters() {
		return '/^[a-z0-9_-]+$/';
	}

	/**
	 * Retrieve max length of a taxonomy name.
	 *
	 * @return int
	 */
	protected function get_max_length() {
		return 32;
	}

	/**
	 * Retrieve the reserved taxonomy names which can not be used
	 * by themes and plugins.
	 *
	 * @return array<string, true>
	 */
	protected function get_reserved_names() {
		return WPReservedKeywordHelper::get_terms();
	}
}
