<?php
/**
 * Page Name: Support
 *
 */

use WPButtons\Admin\SupportForm;
use WPButtons\WOWP_Plugin;

$page_support = WOWP_Plugin::info( 'support');

defined( 'ABSPATH' ) || exit;
?>

    <div class="wpie-block-tool is-white">

        <p>
			<?php
			/* translators: %s: url to support page */
			$text_output = sprintf( __( 'To get your support related question answered in the fastest timing, please send a message via the form below or write to us via <a href="%s" target="_blank">support page</a> .', 'buttons' ), esc_url($page_support) );
			echo wp_kses_post( $text_output );
            ?>
        </p>

        <p>
			<?php esc_html_e( 'Also, you can send us your ideas and suggestions for improving the plugin.', 'buttons' ); ?>
        </p>

		<?php SupportForm::init(); ?>

    </div>
<?php
