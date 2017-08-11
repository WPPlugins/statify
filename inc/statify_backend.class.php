<?php
/** Quit */
defined( 'ABSPATH' ) || exit;

/**
 * Statify_Backend
 *
 * @since 1.4.0
 */
class Statify_Backend {

	/**
	 * Add plugin meta links
	 *
	 * @since    0.1.0
	 * @version  1.4.0
	 *
	 * @param   array  $input Registered links.
	 * @param   string $file  Current plugin file.
	 *
	 * @return  array           Merged links
	 */
	public static function add_meta_link( $input, $file ) {

		/* Restliche Plugins? */
		if ( STATIFY_BASE !== $file ) {
			return $input;
		}

		return array_merge(
			$input,
			array(
				'<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=8CH5FPR88QYML" target="_blank" rel="noopener noreferrer">' . esc_html__( 'Donate', 'statify' ) . '</a>',
				'<a href="https://wordpress.org/support/plugin/statify" target="_blank" rel="noopener noreferrer">' . esc_html__( 'Support', 'statify' ) . '</a>',
			)
		);
	}

	/**
	 * Add plugin action links
	 *
	 * @since   0.1.0
	 * @version 1.4.0
	 *
	 * @param   array $input Registered links.
	 *
	 * @return  array           Merged links
	 */
	public static function add_action_link( $input ) {

		/* Rechte? */
		if ( ! current_user_can( 'edit_dashboard' ) ) {
			return $input;
		}

		/** Zusammenführen */
		return array_merge(
			$input,
			array(
				sprintf(
					/** @lang  Disable language injection for Url query argument. */
					'<a href="%s">%s</a>',
					add_query_arg( array( 'edit' => 'statify_dashboard#statify_dashboard' ),
						admin_url( '/' )
					),
					esc_html__( 'Settings', 'statify' )
				)
			)
		);
	}
}