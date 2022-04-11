drwxr-xr-x   2 docwise  docwise      4096 Apr 14 13:51 .
drwxr-xr-x  13 docwise  docwise      8192 Apr 14 13:51 ..
-rw-r--r--   1 docwise  docwise     29098 Apr 14 13:51 avada-cp-import-functions.php
-rw-r--r--   1 docwise  docwise      7865 Apr 14 13:51 avada-import-functions.php
-rw-r--r--   1 docwise  docwise      9081 Apr 14 13:51 class-avada-demo-content-tracker.php
-rw-r--r--   1 docwise  docwise     39978 Apr 14 13:51 class-avada-demo-import.php
-rw-r--r--   1 docwise  docwise     11953 Apr 14 13:51 class-avada-demo-remove.php
-rw-r--r--   1 docwise  docwise     12226 Apr 14 13:51 class-avada-importer-data.php
-rw-r--r--   1 docwise  docwise     66942 Apr 14 13:51 demos.json
-rw-r--r--   1 docwise  docwise      1035 Apr 14 13:51 importer.php
( 'current_screen', [ $this, 'display_notice' ] );

		// Handle saving the data via ajax.
		add_action( 'wp_ajax_fusion_dismiss_admin_notice', [ $this, 'dismiss_notice' ] );
	}

	/**
	 * Check if we're on the right screen and display notice.
	 *
	 * @access public
	 * @since 1.5.2
	 * @return void
	 */
	public function display_notice() {
		if ( isset( $_GET['page'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification
			$this->current_screen = sanitize_text_field( wp_unslash( $_GET['page'] ) ); // phpcs:ignore WordPress.Security.NonceVerification
			$this->screens        = $this->get_allowed_screens();
			$this->server_data    = $this->get_server_data();
			$this->message        = $this->get_message_contents( $this->current_screen );

			if ( class_exists( 'Fusion_Admin_Notice' ) && ( isset( $this->current_screen ) && in_array( $this->current_screen, $this->screens, true ) ) ) {
				new Fusion_Admin_Notice(
					'fusion-privacy-notice',
					$this->message,
					is_super_admin(),
					'info',
					true,
					'user_meta',
					'the-meta',
					[ 'avada_page_' . $this->current_screen ]
				);
			}
		}
	}

	/**
	 * Dmismiss notice.
	 *
	 * @access public
	 * @since 1.5.2
	 * @return void
	 */
	public function dismiss_notice() {
		check_ajax_referer( 'fusion_admin_notice', 'nonce' );

		if ( ! empty( $_POST ) && isset( $_POST['data'] ) ) {
			$option = '';
			if ( isset( $_POST['data']['dismissOption'] ) ) {
				$option = sanitize_text_field( wp_unslash( $_POST['data']['dismissOption'] ) );
			} elseif ( isset( $_POST['data']['dismiss-option'] ) ) {
				$option = sanitize_text_field( wp_unslash( $_POST['data']['dismiss-option'] ) );
			}

			$type = '';
			if ( isset( $_POST['data']['dismissType'] ) ) {
				$type = sanitize_text_field( wp_unslash( $_POST['data']['dismissType'] ) );
			} elseif ( isset( $_POST['data']['dismiss-type'] ) ) {
				$type = sanitize_text_field( wp_unslash( $_POST['data']['dismiss-type'] ) );
			}

			switch ( $type ) {
				case 'user_meta':
					update_user_meta( get_current_user_id(), $option, true );
					break;
			}
		}

		wp_die();
	}

	/**
	 * Get list of screens where notice should be displayed.
	 *
	 * @access private
	 * @since 1.5.2
	 * @return array
	 */
	private function get_allowed_screens() {
		$screens = [
			'avada-prebuilt-websites',
			'avada-plugins',
			'avada-patcher',
		];

		return $screens;
	}

	/**
	 * Array of data which is sent to server.
	 *
	 * @access private
	 * @since 1.5.2
	 * @return array
	 */
	private function get_server_data() {
		global $wp_version;

		$data = [
			'avada_ver' => [
				'name'  => esc_html__( 'Avada Version', 'fusion-builder' ),
				'value' => ( defined( 'AVADA_VERSION' ) ) ? AVADA_VERSION : '',
			],
			'url'       => [
				'name'  => esc_html__( 'Site URL', 'fusion-builder' ),
				'value' => site_url(),
			],
		];

		// Registered we pass on purchase code.
		if ( class_exists( 'Avada' ) ) {
			if ( Avada()->registration->is_registered() ) {
				$data['purchase_code'] = [
					'name'  => esc_html__( 'Purchase Code', 'fusion-builder' ),
					'value' => class_exists( 'Avada' ) ? Avada()->registration->get_purchase_code() : '',
				];
			} elseif ( Avada()->registration->legacy_support() ) {
				$data['token'] = [
					'name'  => esc_html__( 'Token', 'fusion-builder' ),
					'value' => class_exists( 'Avada' ) ? Avada()->registration->get_token() : '',
				];
			}
		}
		return $data;
	}

	/**
	 * Prepare message contents.
	 *
	 * @access private
	 * @since 1.5.2
	 * @param string $page current page slug.
	 * @return string
	 */
	private function get_message_contents( $page ) {
		$message = sprintf( '<h2>%s</h2>', esc_html__( 'Sending Of Verification Data', 'fusion-builder' ) );

		switch ( $page ) {
			case 'avada-prebuilt-websites':
				$message .= sprintf( '<p>%s</p>', esc_html__( 'Once you click to import a prebuilt website, the following data will be sent to a ThemeFusion server located in the U.S. to verify purchase and to ensure that prebuilt websites are compatible with your install.', 'fusion-builder' ) );
				break;

			case 'avada-plugins':
				$message .= sprintf( '<p>%s</p>', esc_html__( 'Once you click to install / update a premium plugin, the following data will be sent to a ThemeFusion server located in the U.S. to verify purchase and to ensure that plugins are compatible with your install.', 'fusion-builder' ) );
				break;
			default:
				$message .= sprintf( '<p>%s</p>', esc_html__( 'The following data is sent to a ThemeFusion server located in the U.S. to ensure that patches are compatible with your install.', 'fusion-builder' ) );
		}
		$message .= '<table>';

		$data = $this->server_data;

		foreach ( $data as $slug => $info ) {
			if ( 'token' === $slug || 'purchase_code' === $slug ) {
				$token_length = strlen( $info['value'] ) / 2;
				$token        = substr( $info['value'], 0, $token_length ) . str_repeat( '*', $token_length );
				$message     .= sprintf( '<tr><td>%s:</td><td>%s</td></tr>', $info['name'], $token );
				continue;
			}

			$message .= sprintf( '<tr><td>%s:</td><td>%s</td></tr>', $info['name'], $info['value'] );
		}

		$message .= '</table>';

		return $message;
	}

	/**
	 * Check if message should be displayed or not?
	 *
	 * @access private
	 * @since 1.5.2
	 * @return bool
	 */
	private function is_show() {
		if ( 'avada-patcher' === $this->current_screen || ( ( 'avada' === $this->current_screen || 'avada-plugins' === $this->current_screen || 'avada-prebuilt-websites' === $this->current_screen ) && class_exists( 'Avada' ) && Avada()->registration->is_registered() ) ) {
			return true;
		}

		return false;
	}
}
