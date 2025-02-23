<?php
/**
 * @package   OMGF Pro
 * @author    Daan van den Bergh
 *            https://daan.dev
 * @copyright © 2017 - 2024 Daan van den Bergh
 * @license   BY-NC-ND-4.0
 *            http://creativecommons.org/licenses/by-nc-nd/4.0/
 */

namespace OMGF\Pro\Frontend\Optimize;

use OMGF\Pro\Admin\Settings;
use OMGF\Pro\Frontend\Optimize;
use OMGF\Pro\Wrapper;

class InlineStyles extends Optimize {
	/**
	 * Takes care of processing Inline Style blocks containing @import (fonts.googleapis.com) and
	 * @font-face (fonts.gstatic.com) statements.
	 *
	 * @param string $html
	 *
	 * @return string
	 * @throws SodiumException
	 * @throws TypeError
	 */
	public function optimize( $html ) {
		/**
		 * @since v3.7.0 Always run when Auto Config is enabled.
		 */
		if ( $this->auto_config || ! empty( Wrapper::get_option( Settings::OMGF_DETECTION_SETTING_PROCESS_INLINE_STYLES ) ) ) {
			$html = $this->process_imports( $html );
			$html = $this->process_font_faces( $html );
		}

		/**
		 * @since v3.7.0 Don't run Fallback Font Stacks if Auto Config (and Save & Optimize) is running to prevent
		 *               false positives for Process Inline Styles.
		 */
		if ( ! $this->auto_config && ! empty( Wrapper::get_option( Settings::OMGF_OPTIMIZE_SETTING_FALLBACK_FONT_STACK ) ) ) {
			$html = $this->process_fallback_font_stacks( $html ); // @codeCoverageIgnore
		}

		/**
		 * @since v3.7.0 Don't run Force Font Display if Auto Config (and Save & Optimize) is running to prevent
		 *               false positives for Process Inline Styles.
		 */
		if ( ! $this->auto_config && ! empty( Wrapper::get_option( Settings::OMGF_OPTIMIZE_SETTING_FORCE_FONT_DISPLAY ) ) ) {
			$html = $this->process_force_font_display( $html ); // @codeCoverageIgnore
		}

		return $html;
	}
}
