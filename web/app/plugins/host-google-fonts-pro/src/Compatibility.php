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

/**
 * This class contains compatibility fixes needed in frontend and admin.
 * For frontend only fixes, @see Frontend\Optimize\Compatibility!
 */
class Compatibility {
	const USER_AGENT_AVADA_COMPATIBILITY       = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.190 Safari/537.36';

	const USER_AGENT_MAILER_LITE_COMPATIBILITY = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0';

	/**
	 * Build class.
	 */
	public function __construct() {
		$this->init();
	}

	/**
	 * Action and filter hooks.
	 *
	 * @return void
	 */
	private function init() {
		/** Avada */
		add_filter( 'omgf_optimize_user_agent', [ $this, 'avada_compatibility' ] );

		/** Mailerlite */
		add_filter( 'omgf_optimize_user_agent', [ $this, 'mailerlite_compatibility' ] );

		/** Porto */
		add_filter( 'omgf_pro_webfont_loader_search_replace_regex_async', [ $this, 'porto_compatibility' ] );
	}

	/**
	 * Compatibility with Avada, to make sure we both use the same user agents.
	 *
	 * @return string
	 */
	public function avada_compatibility( $user_agent ) {
		$theme  = wp_get_theme();
		$parent = $theme->parent();

		if ( ( $theme instanceof \WP_Theme && $theme->get_template() !== 'Avada' ) ||
			( $parent instanceof \WP_Theme && $parent->get( 'Name' ) !== 'Avada' ) ) {
			return $user_agent; // @codeCoverageIgnore
		}

		return self::USER_AGENT_AVADA_COMPATIBILITY;
	}

	/**
	 * Provide a more recent user agent to Mailerlite users, to match the fonts it uses.
	 *
	 * @param $user_agent
	 *
	 * @return string|void
	 */
	public function mailerlite_compatibility( $user_agent ) {
		if ( defined( 'MAILERLITE_VERSION' ) ) {
			return self::USER_AGENT_MAILER_LITE_COMPATIBILITY;
		}

		return $user_agent;
	}

	/**
	 * Adjusts the regex pattern for compatibility with the Porto theme.
	 *
	 * @param string $regex The original regex pattern.
	 *
	 * @return string The modified regex pattern if the Porto theme is detected, otherwise returns the original regex.
	 */
	public function porto_compatibility( $regex ) {
		$theme  = wp_get_theme();
		$parent = $theme->parent();

		if ( ( $theme instanceof \WP_Theme && $theme->get_template() !== 'porto' ) ||
			( $parent instanceof \WP_Theme && $parent->get_template() !== 'porto' ) ) {
			return $regex;
		}

		return '/WebFontConfig.*?{(.*?)}[;]+?/s';
	}
}