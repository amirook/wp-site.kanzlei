<?php
/**
 * @package   OMGF Pro
 * @author    Daan van den Bergh
 *            https://daan.dev
 * @copyright © 2017 - 2024 Daan van den Bergh
 * @license   BY-NC-ND-4.0
 *            http://creativecommons.org/licenses/by-nc-nd/4.0/
 */

namespace OMGF\Pro;

use OMGF\Frontend\Process;
use OMGF\Pro\Admin\Notice;
use stdClass;

class Wrapper {
	/**
	 * A safety wrapper for OMGF's OMGF_UPLOAD_URL constant.
	 *
	 * @return string protocol relative URL to OMGF's uploads dir.
	 */
	public static function get_upload_url() {
		if ( ! defined( 'OMGF_UPLOAD_URL' ) ) {
			return str_replace( [ 'http:', 'https:' ], '', WP_CONTENT_URL . '/uploads/omgf' ); // @codeCoverageIgnore
		}

		return OMGF_UPLOAD_URL;
	}

	/**
	 * A safety wrapper for OMGF's OMGF_UPLOAD_DIR constant.
	 *
	 * @return string Absolute path to OMGF's uploads dir.
	 */
	public static function get_upload_dir() {
		if ( ! defined( 'OMGF_UPLOAD_DIR' ) ) {
			return WP_CONTENT_DIR . '/uploads/omgf'; // @codeCoverageIgnore
		}

		return OMGF_UPLOAD_DIR;
	}

	/**
	 * A safety wrapper for OMGF's get_option method, to prevent fatal errors during updates.
	 *
	 * @since 3.8.2
	 *
	 * @param mixed $option_name
	 * @param mixed $default (optional)
	 *
	 * @return mixed
	 */
	public static function get_option( $option_name, $default = null ) {
		if ( ! class_exists( '\OMGF\Helper' ) ) {
			return $default; // @codeCoverageIgnore
		}

		return \OMGF\Helper::get_option( $option_name, $default );
	}

	/**
	 * A safety wrapper around OMGF's update_option_method, to prevent fatal errors during updates.
	 *
	 * @since 3.8.2
	 *
	 * @param mixed $option_name
	 * @param mixed $value
	 *
	 * @return bool
	 */
	public static function update_option( $option_name, $value ) {
		if ( ! class_exists( '\OMGF\Helper' ) ) {
			return false; // @codeCoverageIgnore
		}

		return \OMGF\Helper::update_option( $option_name, $value );
	}

	/**
	 * A safety wrapper around OMGF's delete_option method, to prevent fatal errors during updates.
	 *
	 * @since 3.8.2
	 *
	 * @param mixed $option_name
	 *
	 * @return bool
	 */
	public static function delete_option( $option_name ) {
		if ( ! class_exists( '\OMGF\Helper' ) ) {
			return false; // @codeCoverageIgnore
		}

		\OMGF\Helper::delete_option( $option_name );
	}

	/**
	 * A safety wrapper around OMGF's optimized_fonts method, to prevent fatal errors during updates.
	 *
	 * @since 3.11.0
	 * @return array
	 */
	public static function optimized_fonts( $maybe_add = [], $force_add = false ) {
		if ( ! class_exists( '\OMGF\Helper' ) ) {
			return []; // @codeCoverageIgnore
		}

		return \OMGF\Helper::optimized_fonts( $maybe_add, $force_add );
	}

	/**
	 * A safety wrapper around OMGF's unloaded_fonts method, to prevent fatal errors during updates.
	 *
	 * @since 3.8.2
	 * @return array
	 */
	public static function unloaded_fonts() {
		if ( ! class_exists( '\OMGF\Helper' ) ) {
			return []; // @codeCoverageIgnore
		}

		return \OMGF\Helper::unloaded_fonts();
	}

	/**
	 * A safety wrapper around OMGF's unloaded_stylesheets method, to prevent fatal errors during updates.
	 *
	 * @since 3.8.2
	 * @return array
	 */
	public static function unloaded_stylesheets() {
		if ( ! class_exists( '\OMGF\Helper' ) ) {
			return []; // @codeCoverageIgnore
		}

		return \OMGF\Helper::unloaded_stylesheets();
	}

	/**
	 * A safety wrapper around OMGF's get_cache_key method, to prevent fatal errors during updates.
	 *
	 * @since 3.8.2
	 *
	 * @param $handle
	 *
	 * @return string
	 */
	public static function get_cache_key( $handle ) {
		if ( ! class_exists( '\OMGF\Helper' ) ) {
			return ''; // @codeCoverageIgnore
		}

		return \OMGF\Helper::get_cache_key( $handle );
	}

	/**
	 * A safety wrapper for OMGF's Process-class. To minimize dependency and prevent fatal errors during updates.
	 *
	 * @return stdClass|Process
	 */
	public static function get_frontend_processor() {
		if ( ! class_exists( '\OMGF\Frontend\Process' ) ) {
			// @codeCoverageIgnoreStart
			Notice::set_notice(
				__( 'OMGFs frontend processor couldn\'t be fetched. Is OMGF installed and/or activated?', 'omgf-pro' )
			);

			return new stdClass();
			// @codeCoverageIgnoreEnd
		}

		return new \OMGF\Frontend\Process();
	}

	/**
	 * A safety wrapper around OMGF's debug method, to prevent fatal errors during updates.
	 *
	 * @since 3.8.2
	 *
	 * @param $message
	 *
	 * @return void
	 */
	public static function debug( $message ) {
		if ( ! class_exists( '\OMGF\Helper' ) ) {
			return; // @codeCoverageIgnore
		}

		\OMGF\Helper::debug( $message );
	}

	/**
	 * A safety wrapper around OMGF's debug_array method, to prevent fatal errors during updates.
	 *
	 * @since 3.8.2
	 *
	 * @param $name
	 * @param $array
	 *
	 * @return void
	 */
	public static function debug_array( $name, $array ) {
		if ( ! class_exists( '\OMGF\Helper' ) ) {
			return; // @codeCoverageIgnore
		}

		\OMGF\Helper::debug_array( $name, $array );
	}
}
